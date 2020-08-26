<?php

namespace App\Http\Controllers;
use App\Ordinance;
use App\Category;
use App\HistoryOrdinance;
use Illuminate\Http\Request;
use DataTables;

class OrdinanceController extends Controller
{
    //

    public function index() {

        $categories = Category::get();
        return view('ordinances',array(
            'subheader' => 'Home',
            'header' => 'Ordinances',
            'categories' => $categories,
        ));

    }

    public function getOrdinances(){

        $ordinances = Ordinance::join('categories' , 'ordinances.category_id' , '=' , 'categories.id')
                        ->select('ordinances.*' , 'categories.name');

        return Datatables::of($ordinances)
                ->editColumn('ordinance_number', '{{$ordinance_number}}')
                ->setRowId('ordinance_number')
                ->make(true);
    }

    public function edit_ordinance($id)
    {
        $ordinance = Ordinance::find($id);
        return $ordinance;
    }

    public function new_ordinance (Request $request)
    {
        $ordinance = new Ordinance;
        $ordinance->ordinance_number = $request->ordinance_number;
        $ordinance->title = $request->title;
        $ordinance->date_approved = $request->date_approved;
        $ordinance->status = $request->status;
        $ordinance->category_id = $request->category;
        $ordinance->remarks = $request->remarks;

        $ordinance->sponsor = $request->sponsor;
        
        $attachments = $request->attachment;
        if($attachments)
        {   
            $uniqid = uniqid();
            $attachment_path = public_path().'/attachments/';
            $attachment_folder = $attachment_path.$uniqid;

            $file_names = [];
            $file_names['attachment_folder'] = $uniqid;

            foreach ($attachments as $attachment) {
                
                $original_name = str_replace(' ', '',$attachment->getClientOriginalName());
                $name = time().'_'.$original_name;

                if ( !file_exists($attachment_folder))
                {
                    \File::makeDirectory($attachment_folder , 0777 , true);
                }

                $attachment->move($attachment_folder, $name);
                $file_names['files'][] = $name;

            }

            $ordinance->uploaded_file  = serialize($file_names) ;
        }

        $ordinance->uploaded_by  = auth()->user()->id ;
        $ordinance->save();

        $request->session()->flash('status','Successfully Added.');
        return back(); 
    }   
    public function update_ordinance (request $request , $id)
    {
        $ordinance = Ordinance::findOrfail($id);
    
        $ordinance->ordinance_number = $request->ordinance_number;
        $ordinance->title = $request->title;
        $ordinance->date_approved = $request->date_approved;
        $ordinance->status = $request->status;
        $ordinance->sponsor = $request->sponsor;
        
        $ordinance->category_id = $request->category;
        $ordinance->remarks = $request->remarks;
        
        $attachments = $request->attachment;
        if($attachments)
        {   
            $uniqid = ($request->attachment_folder)  ? $request->attachment_folder : uniqid();
            $attachment_path = config('app.attachment_path');
            $attachment_folder = $attachment_path.$uniqid;

            $file_names = [];
            $file_names['attachment_folder'] = $uniqid;

            $old_files = @unserialize($ordinance->uploaded_file);
            $old_files = $old_files['files'];
            
            foreach ($attachments as $attachment) {
                
                $original_name = str_replace(' ', '',$attachment->getClientOriginalName());
                $name = time().'_'.$original_name;

                if ( !file_exists($attachment_folder))
                {
                    \File::makeDirectory($attachment_folder , 0777 , true);
                }

                $attachment->move($attachment_folder, $name);

               
                if (!empty($old_files)) {
                    array_push($old_files, $name);
                } else 
                {
                    $old_files[] = $name;
                }

            }

            $file_names['files'] = $old_files;
            $ordinance->uploaded_file  = serialize($file_names) ;
            
        }

        $ordinance->uploaded_by  = auth()->user()->id ;
        $ordinance->save();
        
        return json_encode($ordinance);

    }


    public function delete_ordinance(request $request,  $id) {

            $ordinance = Ordinance::find($id);

            if ($ordinance) {
                $ordinance->delete();

                $request->session()->flash('status','Successfully Deleted.');
                return back(); 
            }

    }

    public function delete_or_file (Request $request , $id , $filename)
    {
        $ordinance = Ordinance::find($id);

        if ($ordinance) {
            
            $attachments = unserialize($ordinance->uploaded_file);
            $folder = $attachments['attachment_folder'];
            $files = $attachments['files'];

            foreach ($files as $file) {
                if ($file == $filename) {

                    \File::delete(config('app.attachment_path').'/'.$folder.'/'. $filename);

                    $key = array_search($filename, $attachments['files']);
                    
                    unset ($attachments['files'][$key]);

                    $serailize_data = serialize($attachments);

                    $ordinance->uploaded_file = $serailize_data;
                    $ordinance->save();

                    $request->session()->flash('status',$ordinance->title .' Successfully attachment deleted  .');

                    return back();
                }
            }
        }
    }


}
