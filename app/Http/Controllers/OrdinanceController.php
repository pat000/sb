<?php

namespace App\Http\Controllers;
use App\Ordinance;
use App\HistoryOrdinance;
use Illuminate\Http\Request;

class OrdinanceController extends Controller
{
    //
    public function new_ordinance (Request $request)
    {
        // dd($request->all());
        $attachment = $request->attachment;
        $ordinance = new Ordinance;
        $ordinance->ordinance_number = $request->ordinance_number;
        $ordinance->title = $request->title;
        $ordinance->date_approved = $request->date_approved;
        $ordinance->status = $request->status;
        $ordinance->category = $request->category;
        $ordinance->remarks = $request->remarks;

        $ordinance->sponsor = $request->sponsor;
        $ordinance->approver = $request->approver;

        $original_name = str_replace(' ', '',$attachment->getClientOriginalName());
        $name = time().'_'.$original_name;
        
        $attachment->move(public_path().'/attachments/', $name);
        $file_name = '/attachments/'.$name;
        $ext = pathinfo(storage_path().$file_name, PATHINFO_EXTENSION);

        $ordinance->uploaded_file  = $file_name ;
        $ordinance->uploaded_by  = auth()->user()->id ;
        $ordinance->save();

        $request->session()->flash('status','Successfully Added.');
        return back(); 
    }   
    public function edit_ordinance (request $request , $id)
    {
        $ordinance = Ordinance::findOrfail($id);
        $history_ordinance = new HistoryOrdinance;
        $history_ordinance->ordinance_number = $ordinance->ordinance_number;
        $history_ordinance->title = $ordinance->title;
        $history_ordinance->date_approved = $ordinance->date_approved;
        $history_ordinance->status = $ordinance->status;
        $history_ordinance->category = $ordinance->category;
        $history_ordinance->remarks = $ordinance->remarks;
        $history_ordinance->uploaded_file = $ordinance->uploaded_file;
        $history_ordinance->ordinance_id = $id;
        $history_ordinance->uploaded_by = $ordinance->uploaded_by;
        $history_ordinance->save();

        $attachment = $request->attachment;
        $ordinance->ordinance_number = $request->ordinance_number;
        $ordinance->title = $request->title;
        $ordinance->date_approved = $request->date_approved;
        $ordinance->status = $request->status;
        $ordinance->sponsor = $request->sponsor;
        $ordinance->approver = $request->approver;
        
        $ordinance->category = $request->category;
        $ordinance->remarks = $request->remarks;
        if($attachment)
        {
        $original_name = str_replace(' ', '',$attachment->getClientOriginalName());
        $name = time().'_'.$original_name;
        $attachment->move(public_path().'/attachments/', $name);
        $file_name = '/attachments/'.$name;
        $ext = pathinfo(storage_path().$file_name, PATHINFO_EXTENSION);
        $ordinance->uploaded_file  = $file_name ;
        }
        $ordinance->uploaded_by  = auth()->user()->id ;
        $ordinance->save();
        
        $request->session()->flash('status','Successfully Changed.');
        return back(); 

    }
}
