<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function create(){
         
        $field_create=request()->field; 
        
        if($field_create=='addresses'){
            return view('addresses.create');
            
        }
        if($field_create=='areas'){
            return view('areas.create');
            
        }
        if($field_create=='doctors'){
            return view('doctors.create');
            
        }
        if($field_create=='medicines'){
            return view('medicines.create');
            
        }
        if($field_create=='orders'){
            return view('orders.create');
            
        }
        if($field_create=='revenue'){
            return view('revenue.index');
            
        }


     }
}
