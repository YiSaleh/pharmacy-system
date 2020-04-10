<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use App\Pharmacy;
use App\User;
use Spatie\Permission\Models\Role;





class PharmacyController extends Controller
{
     public function index(){
        $userId=auth()->user()->id;
        $user=User::find($userId);
        if($user->hasRole('admin')){
        $pharmacies=Pharmacy::orderBy('id' , 'asc')->paginate(5);
        }
        elseif($user->hasRole('owner')){
         $pharmacies=Pharmacy::where('owner_id',$userId)->paginate(5);
        }
    	return view('pharmacies.index',['pharmacies'=>$pharmacies]);
    }

     public function create()
    {   
        $owners= User::role('owner')->get();
    	$areas=Area::all();
    	return view('pharmacies.create', 
    		['areas'=>$areas,'owners'=>$owners
    	]);
    }
    public function store()
    {   
    	Pharmacy::create([
    		'name'=>request()->name,
    	     'periority'=>request()->periority,
    	      'area_id'=>request()->area_id,
              'owner_id'=>request()->owner_id,
          ]);
    		return redirect()->route('pharmacy.index');
    }
    public function show(){
        // $owner=request()->owner;
        // dd(request()->pharmacy);
    	$pharmacy=Pharmacy::find(request()->pharmacy);
        // dd($pharmacy->owner_id);
        $owner=User::find($pharmacy->owner_id);
    	return view('pharmacies.show',['pharmacy'=>$pharmacy, 'owner'=>$owner]);
    }
    public function edit(){
        $owners= User::role('owner')->get();
    	$areas=Area::all();
    	$pharmacy=Pharmacy::find(request()->pharmacy);
    	return view('pharmacies.edit',['pharmacy'=>$pharmacy, 'areas'=>$areas, 'owners'=>$owners]);
    }
    public function update(){
         // $r=request();
         // dd($r); 
    	Pharmacy::find(request()->pharmacy)->update([
            'name'=>request()->name,
            'periority'=>request()->periority,
    	    'area_id'=>request()->area_id,
             'owner_id'=>request()->owner_id]);
    	return redirect()->route('pharmacy.index');
    }
    public function destroy(){
         Pharmacy::where('id',request()->pharmacy)->delete();
        return redirect()->route('pharmacy.index');
    }
}
