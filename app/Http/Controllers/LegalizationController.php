<?php

namespace App\Http\Controllers;

use App\Legalization;
use App\Category;
use Illuminate\Http\Request;

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
        $legalizations = Legalization::orderBy('created_at','desc')->get();
        return view('legalizations',array(

            'subheader' => 'Home',
            'header' => 'Legalizations',
            'categories' => $categories,
            'legalizations' => $legalizations,
            
        ));
    }

     public function new_legalization (Request $request)
    {
        // dd($request->all());
        $attachment = $request->attachment;
        $legalization = new Legalization;
        $legalization->legalization_number = $request->legalization_number;
        $legalization->title = $request->title;
        $legalization->date_approved = $request->date_approved;
        $legalization->status = $request->status;
        $legalization->category_id = $request->category;

        $legalization->sponsor = $request->sponsor;
        
        $original_name = str_replace(' ', '',$attachment->getClientOriginalName());
        $name = time().'_'.$original_name;
        
        $attachment->move(public_path().'/attachments/', $name);
        $file_name = '/attachments/'.$name;
        $ext = pathinfo(storage_path().$file_name, PATHINFO_EXTENSION);

        $legalization->uploaded_file  = $file_name ;
        $legalization->uploaded_by  = auth()->user()->id ;
        $legalization->save();

        $request->session()->flash('status','Successfully Added.');
        return back(); 
    } 


    public function edit_legalization (request $request , $id)
    {
        $legalization = Legalization::findOrfail($id);
        
        $attachment = $request->attachment;
        $legalization->legalization_number = $request->legalization_number;
        $legalization->title = $request->title;
        $legalization->date_approved = $request->date_approved;
        $legalization->status = $request->status;
        $legalization->sponsor = $request->sponsor;
        
        $legalization->category_id = $request->category;
        if($attachment)
        {
        $original_name = str_replace(' ', '',$attachment->getClientOriginalName());
        $name = time().'_'.$original_name;
        $attachment->move(public_path().'/attachments/', $name);
        $file_name = '/attachments/'.$name;
        $ext = pathinfo(storage_path().$file_name, PATHINFO_EXTENSION);
        $legalization->uploaded_file  = $file_name ;
        }
        $legalization->uploaded_by  = auth()->user()->id ;
        $legalization->save();
        
        $request->session()->flash('status','Successfully Changed.');
        return back(); 

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
}
