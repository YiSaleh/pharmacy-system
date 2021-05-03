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
    public function store()
    {
    	Area::create(request()->all());
    	return redirect()->route('areas.index');
    }

    public function destroy()
    {
         Area::where('id',request()->area)->delete();
        return redirect()->route('areas.index');
    }
    public function show()
    {
    	$area=Area::find(Request()->area);
    	return view('areas.show',['area'=>$area]);
    }
   
     public function edit(){
    	$area=Area::find(request()->area);
    	return view('areas.edit',['area'=>$area]);
    }
    public function update()
    {
    	Area::find(request()->area)->update(request()->all());
    	return redirect()->route('areas.index');
    }
}
