<?php

namespace App\Http\Controllers;

use App\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index()
    {
        $medicines=Medicine::all();
        return view('medicines.index',[
            'medicines'=> $medicines,
        ]);
    }

    
    public function show()
    {
    $medicine = Medicine::find(request()->medicine);
    return view('medicines.show',[
        'medicine'=> $medicine,
    ]);
    }

    public function create()
    {  
        return view('medicines.create',[
            'medicines' => Medicine::get(),
           
        ]);
    }

    public function store()
    {    
        // dd(request());
        Medicine::create([
            'name' => request()->name,
            'price' => request()->price,
            'type' => request()->type,
            'quantity'=> request()->quantity,
           
        ]);
        return redirect()->route('medicines.index');
    }

    public function edit()
    { 
            $medicineId=request()->medicine;
    	$medicine = Medicine::find($medicineId);
    	return view('medicines.edit',['medicine'=>$medicine]);
       
    }
    public function update(){
		$medicineId=request()->medicine;
        
        Medicine::find($medicineId)->update([
            'name'=>request()->name,
            'price'=>request()->price,
            'type'=>request()->type,
            'quantity'=>request()->quantity
            ]);
    	return redirect()->route('medicines.index');
    }


    public function destroy(){
        $medicineId =request()->medicine;
        $medicine=Medicine::find($medicineId);
        $medicine->delete();
        return redirect()->route('medicines.index');
     }
     
}
