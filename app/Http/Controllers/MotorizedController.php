<?php

namespace App\Http\Controllers;

use App\Motorized;
use Illuminate\Http\Request;

class MotorizedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $motorized = Motorized::orderBy('created_at','desc')->get();
        return view('motorized',array(

            'subheader' => 'Home',
            'header' => 'Legalization',
            'motorized' => $motorized,
            
        ));


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

        $motorized = new Motorized;

        $motorized->case_no = $request->case_no;
        $motorized->operator_name = $request->operator_name;
        $motorized->address = $request->address;
        $motorized->motor_name = $request->motor_name;
        $motorized->motor_no = $request->motor_number;
        $motorized->motor_chassic = $request->motor_chassic;
        $motorized->plate_number = $request->plate_number;

        $motorized->date_issued = $request->date_issued;
        $motorized->vice_mayor = $request->vice_mayor;
        $motorized->age =   $request->age;

        $motorized->save();


        $request->session()->flash('status','Successfully Added.');
        return back(); 
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

        dd('asas');
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

        $motorized = Motorized::find($id);

        if ($motorized) {

            $motorized->case_no = $request->case_no;
            $motorized->operator_name = $request->operator_name;
            $motorized->address = $request->address;
            $motorized->motor_name = $request->motor_name;
            $motorized->motor_no = $request->motor_number;
            $motorized->motor_chassic = $request->motor_chassic;
            $motorized->plate_number = $request->plate_number;

            $motorized->date_issued = $request->date_issued;
            $motorized->vice_mayor = $request->vice_mayor;
            $motorized->age =   $request->age;

            $motorized->save();


            $request->session()->flash('status','Data for '.$motorized->operator_name.' Successfully Updated.');
            return back(); 

        } else  
        {
            $request->session()->flash('status','Data not found.');
            return back(); 
        }
        


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //

        $motorized = Motorized::find($id);

        if ($motorized) {

            $motorized->delete();

            $request->session()->flash('status','Successfully Deleted.');
            return back(); 
        }
    }
}
