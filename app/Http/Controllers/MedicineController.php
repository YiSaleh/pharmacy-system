<?php

namespace App\Http\Controllers;

use App\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index()
    {
        $medicines=Medicine::all();
        return view('medicines.index',['medicines'=> $medicines]);
    }

    public function show()
    {
        $medicine = Medicine::find(request()->medicine);
        return view('medicines.show',['medicine'=> $medicine]);
    }

    public function create()
    {  
        return view('medicines.create',['medicines' => Medicine::get() ]);
    }

    public function store()
    {    
        Medicine::create(request()->all());
        return redirect()->route('medicines.index');
    }

    public function edit()
    { 
    	$medicine = Medicine::find(request()->medicine);
    	return view('medicines.edit',['medicine'=>$medicine]);
    }

    public function update()
    {
        Medicine::find(request()->medicine)->update(request()->all());
    	return redirect()->route('medicines.index');
    }

    public function destroy(){
        $medicine=Medicine::find(request()->medicine);
        $medicine->delete();
        return redirect()->route('medicines.index');
     }
     
}
