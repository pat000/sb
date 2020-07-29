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

        $motorized->case_no = strtoupper($request->case_no);
        $motorized->operator_name = strtoupper($request->operator_name);
        $motorized->address = strtoupper($request->address);
        $motorized->motor_name = strtoupper($request->motor_name);
        $motorized->motor_no = strtoupper($request->motor_number);
        $motorized->motor_chassic = strtoupper($request->motor_chassic);
        $motorized->plate_number = strtoupper($request->plate_number);

        $motorized->date_issued = strtoupper($request->date_issued);
        $motorized->vice_mayor = strtoupper($request->vice_mayor);
        $motorized->age =   strtoupper($request->age);

        $motorized->save();

        $this->saveForm($motorized);

        return back();
    }

    public  function saveForm($info)
    {      
        $pdf_folder = $info['id'];
        $pdf_name = 'CASE-NO-'.$info['case_no'].'-'.strtoupper(str_slug($info['operator_name']));

        $data['case_no'] = $info['case_no'];
        $data['operator_name'] = $info['operator_name'];
        $data['address'] = $info['address'];

        $data['motor_name'] = $info['motor_name'];
        $data['motor_number'] =$info['motor_no'];
        $data['motor_chassic'] = $info['motor_chassic'];
        $data['plate_number'] = $info['plate_number'];

        $data['date_issued'] = date("M d, Y",strtotime($info['date_issued']));
        $data['vice_mayor'] = $info['vice_mayor'];
        $data['age'] = $info['age'];

        $pdf = \PDF::loadView('pdf.form' , compact('data'));
        $pdf->setPaper('legal', 'portrait');

        $pdf_path = public_path().'/motorized_form/'.$pdf_folder;

        if (!is_file($pdf_path)) {
            \File::makeDirectory($pdf_path , 0777 , true , true);
        }

        return $pdf->save( $pdf_path.'/'.$pdf_name.'.pdf')->stream($pdf_name.'.pdf');
    }


    public function getForm($id) {
        $motorized = Motorized::find($id);

        if ($motorized) {
            return $this->saveForm($motorized);
        }
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

            $motorized->case_no = strtoupper($request->case_no);
            $motorized->operator_name = strtoupper($request->operator_name);
            $motorized->address = strtoupper($request->address);
            $motorized->motor_name = strtoupper($request->motor_name);
            $motorized->motor_no = strtoupper($request->motor_number);
            $motorized->motor_chassic = strtoupper($request->motor_chassic);
            $motorized->plate_number = strtoupper($request->plate_number);

            $motorized->date_issued = strtoupper($request->date_issued);
            $motorized->vice_mayor = strtoupper($request->vice_mayor);
            $motorized->age =   strtoupper($request->age);


            $attachment = $request->signed_form;

            if($attachment)
            {   
                $attachment_path = public_path().'/motorized_form/';
                $attachment_folder = $attachment_path.$motorized->id;

                $original_name = str_replace(' ', '',$attachment->getClientOriginalName());
                $name = time().'_'.$original_name;

                if ( !file_exists($attachment_folder))
                {
                    \File::makeDirectory($attachment_folder , 0777 , true);
                }

                if ($motorized->signed_form) {
                    unlink($attachment_folder.'/'.$motorized->signed_form);
                }

                $attachment->move($attachment_folder, $name);
                $motorized->signed_form  = $name ;
            }


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
