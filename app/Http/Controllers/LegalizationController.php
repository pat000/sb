<?php

namespace App\Http\Controllers;

use App\Legalization;
use App\Category;
use Illuminate\Http\Request;
use DataTables;

class LegalizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::get();
        return view('legalizations',array(

            'subheader' => 'Home',
            'header' => 'Resolutions',
            'categories' => $categories,
            
        ));
    }

    public function getLegalizations(){

        $legalizations = Legalization::join('categories' , 'legalizations.category_id' , '=' , 'categories.id')
                        ->select('legalizations.*' , 'categories.name');

        return Datatables::of($legalizations)
                ->editColumn('legalization_number', '{{$legalization_number}}')
                ->setRowId('legalization_number')
                ->make(true);
    }

    public function edit_legalization($id)
    {
        $legalization = Legalization::find($id);
        return $legalization;
    }

     public function new_legalization (Request $request)
    {
        
        $legalization = new Legalization;
        $legalization->legalization_number = $request->legalization_number;
        $legalization->title = $request->title;
        $legalization->date_approved = $request->date_approved;
        $legalization->status = $request->status;
        $legalization->category_id = $request->category;

        $legalization->sponsor = $request->sponsor;
        
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

            $legalization->uploaded_file  = serialize($file_names) ;
        }

        $legalization->uploaded_by  = auth()->user()->id ;
        $legalization->save();

        $request->session()->flash('status','Successfully Added.');
        return back(); 
    } 


    public function update_legalization (request $request , $id)
    {
        $legalization = Legalization::findOrfail($id);
        
        $legalization->legalization_number = $request->legalization_number;
        $legalization->title = $request->title;
        $legalization->date_approved = $request->date_approved;
        $legalization->status = $request->status;
        $legalization->sponsor = $request->sponsor;
        
        $legalization->category_id = $request->category;
        
        $attachments = $request->attachment;
        if($attachments)
        {   
            $uniqid = ($request->attachment_folder)  ? $request->attachment_folder : uniqid();
            $attachment_path = config('app.attachment_path');
            $attachment_folder = $attachment_path.$uniqid;

            $file_names = [];
            $file_names['attachment_folder'] = $uniqid;

            $old_files = @unserialize($legalization->uploaded_file);
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
            $legalization->uploaded_file  = serialize($file_names) ;
            
        }


        $legalization->uploaded_by  = auth()->user()->id ;
        $legalization->save();
        
        // $request->session()->flash('status','Successfully Changed.');
        // return back();

        return json_encode($legalization); 

    }
  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_legalization(Request $request, $id)
    {
        $legalization = Legalization::find($id);

        if ($legalization) {
            $legalization->delete();

            $request->session()->flash('status','Successfully Deleted.');
            return back(); 
        }
    }

    public function delete_leg_file (Request $request , $id , $filename)
    {
        $legalization = Legalization::find($id);

        if ($legalization) {
            
            $attachments = unserialize($legalization->uploaded_file);
            $folder = $attachments['attachment_folder'];
            $files = $attachments['files'];

            foreach ($files as $file) {
                if ($file == $filename) {

                    \File::delete(config('app.attachment_path').'/'.$folder.'/'. $filename);

                    $key = array_search($filename, $attachments['files']);
                    
                    unset ($attachments['files'][$key]);

                    $serailize_data = serialize($attachments);

                    $legalization->uploaded_file = $serailize_data;
                    $legalization->save();

                    $request->session()->flash('status',$legalization->title .' Successfully attachment deleted  .');

                    return back();
                }
            }
        }
    }
}
