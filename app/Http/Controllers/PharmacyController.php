<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use App\Pharmacy;


class PharmacyController extends Controller
{
     public function index(){
    	$pharmacies=Pharmacy::orderBy('id' , 'asc')->paginate(5);
    	return view('pharmacies.index',['pharmacies'=>$pharmacies]);
    }

     public function create()
    {   
    	$areas=Area::all();
    	return view('pharmacies.create', 
    		['areas'=>$areas,
    	]);
    }
    public function store()
    {   
    	Pharmacy::create([
    		'name'=>request()->name,
    	     'periority'=>request()->periority,
    	      'area_id'=>request()->area_id]);
    		return redirect()->route('pharmacy.index');
    }
    public function show(){
    	$pharmacy=Pharmacy::find(request()->pharmacy);
    	return view('pharmacies.show',['pharmacy'=>$pharmacy]);
    }
    public function edit(){
    	$areas=Area::all();
    	$pharmacy=Pharmacy::find(request()->pharmacy);
    	return view('pharmacies.edit',['pharmacy'=>$pharmacy, 'areas'=>$areas]);
    }
    public function update(){
         // $r=request();
         // dd($r); 
    	Pharmacy::find(request()->pharmacy)->update([
            'name'=>request()->name,
            'periority'=>request()->periority,
    	    'area_id'=>request()->area_id,]);
    	return redirect()->route('pharmacy.index');
    }
    public function destroy(){
        // $area_id=request()->area;
         Pharmacy::where('id',request()->pharmacy)->delete();
        return redirect()->route('pharmacy.index');
    }
}
