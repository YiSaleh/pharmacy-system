<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;


class AreaController extends Controller
{
    public function index(){
    	$areas=Area::orderBy('id' , 'asc')->paginate(5);
    	return view('areas.index',['areas'=>$areas]);
    }
     public function create(){
    	return view('areas.create');
    }
    public function store(){
    	Area::create([
    		'name'=>request()->name]);
    	return redirect()->route('areas.index');
    }
    public function show(){
    	$Request= request();
    	$area_id=$Request->area;
    	$area=Area::find($area_id);
    	return view('areas.show',['area'=>$area]);
    }
    public function destroy(){
    	$area_id=request()->area;
    	 Area::where('id',$area_id)->delete();
    	return redirect()->route('areas.index');
    }
     public function edit(){
    	$area_id=request()->area;
    	$area=Area::find($area_id);
    	return view('areas.edit',['area'=>$area]);
    }
    public function update(){
		$area_id=request()->area;
    	Area::find($area_id)->update([
            'name'=>$request->name]);
    	return redirect()->route('areas.index');
    }
}
