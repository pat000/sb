<?php

namespace App\Http\Controllers;
use App\Category;
use App\Ordinance;
use App\Legalization;
use App\Motorized;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function home()
    {
        $categories = Category::get();
        $ordinances = Ordinance::orderBy('created_at','desc')->get();
        $legalizations = Legalization::orderBy('created_at','desc')->get();
        $motorized = Motorized::orderBy('created_at','desc')->get();

        $data = [];

        $data['total_ordinance']  = count($ordinances); 
        $data['imp_ordinances'] = Ordinance::where('status' , 1)->count();
        $data['not_imp_ordinances'] = Ordinance::where('status' , 0)->count();

        $data['total_legalization']  = count($legalizations); 
        $data['imp_legalizations'] = Legalization::where('status' , 1)->count();
        $data['not_imp_legalizations'] = Legalization::where('status' , 0)->count();

        $data['total_motorized'] = count($motorized);
        return view('home',array(

            'subheader' => 'Dashboard',
            'header' => 'Home',
            'categories' => $categories,
            'ordinances' => $ordinances,
            'data' => $data,
            
        ));

    }
}
