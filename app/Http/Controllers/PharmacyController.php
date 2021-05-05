<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use App\Pharmacy;
use App\User;
use Spatie\Permission\Models\Role;
use App\Http\Requests\PharmacyRequest;

class PharmacyController extends Controller
{
     public function index(){
        if(auth()->user()->hasRole('admin'))
        {
            $pharmacies=Pharmacy::orderBy('id' , 'asc')->paginate(5);
        }
        elseif(auth()->user()->hasRole('owner'))
        {
            $pharmacies=Pharmacy::where('owner_id',auth()->user()->id)->paginate(5);
        }
    	return view('pharmacies.index',['pharmacies'=>$pharmacies]);
    }

     public function create()
    {   
        $owners= User::role('owner')->get();
    	return view('pharmacies.create',['areas'=>Area::all(),'owners'=>$owners ]);
    }

    public function store(PharmacyRequest $request)
    {   
        Pharmacy::create($request->all());
    	return redirect()->route('pharmacy.index');
    }

    public function show()
    {
    	$pharmacy=Pharmacy::find(request()->pharmacy);
        $owner=User::find($pharmacy->owner_id);
    	return view('pharmacies.show',['pharmacy'=>$pharmacy, 'owner'=>$owner]);
    }

    public function edit()
    {
        $owners= User::role('owner')->get();
    	$pharmacy=Pharmacy::find(request()->pharmacy);
    	return view('pharmacies.edit',['pharmacy'=>$pharmacy, 'areas'=>Area::all(), 'owners'=>$owners]);
    }

    public function update()
    {
    	Pharmacy::find(request()->pharmacy)->update(request()->all());
    	return redirect()->route('pharmacy.index');
    }

    public function destroy()
    {
        Pharmacy::where('id',request()->pharmacy)->delete();
        return redirect()->route('pharmacy.index');
    }

    public function trash(){
        $pharmacies= Pharmacy::onlyTrashed()->paginate(10);
        return view('pharmacies.deleted',['pharmacies'=>$pharmacies]);
    }

    public function restore()
    {
        Pharmacy::onlyTrashed()->find(request()->pharmacy)->restore();
        return redirect()->route('pharmacy.index');
    }
}