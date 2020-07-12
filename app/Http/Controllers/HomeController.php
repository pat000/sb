<?php

namespace App\Http\Controllers;
use App\Category;
use App\Ordinance;
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
        $ordinances = Ordinance::with('added_by','history.added_by')->orderBy('created_at','desc')->get();
        return view('home',array(

            'subheader' => 'Dashboard',
            'header' => 'Home',
            'categories' => $categories,
            'ordinances' => $ordinances,
            
        ));

    }
}
