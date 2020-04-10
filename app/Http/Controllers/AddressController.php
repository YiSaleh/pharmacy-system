<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User_Address;
use App\User;
use App\Area;

class AddressController extends Controller
{
    public function index()
    {
        $addresses= User_Address::orderBy('id','asc')->paginate(5);
        return view('addresses.index',[
            'useraddresses'=>$addresses,
            ]);
    }

    public function show()
    {
        return view('addresses.show',[
            'useraddress'=> User_Address::find(request()->useraddress),
        ]);
    }

    public function create()
    {  
        return view('addresses.create',[
            'users' => User::role('user')->get(),
            'areas' => Area::all(),
        ]);
    }

    public function store()
    {    
        User_Address::create([
            'street_name' => request()->street_name,
            'floor_no' => request()->floor_no,
            'building_no' => request()->building_no,
            'flat_no'=> request()->flat_no,
            'user_id'=> request()->user_id,
            'area_id'=> request()->area_id,
            'is_main'=> request()->mainstreet ?  true : false ,
        ]);
        return redirect()->route('useraddresses.index');
    }

    public function edit()
    {  
        return view('addresses.edit',[
            'useraddress' => User_Address::find(request()->useraddress),
            'users' => User::role('user')->get(),
            'areas' => Area::all(),
        ]);
    }

    public function update()
    {
        User_Address::where('id',request()->useraddress)->update([
            'street_name' => request()->street_name,
            'floor_no' => request()->floor_no,
            'building_no' => request()->building_no,
            'flat_no'=> request()->flat_no,
            'user_id'=> request()->user_id,
            'area_id'=> request()->area_id,
            'is_main'=> request()->mainstreet ?  true : false ,
        ]);
        return redirect()->route('useraddresses.index');
    }

    public function destroy()
    {  
        User_Address::where('id',request()->useraddress)->delete();
        return redirect()->route('useraddresses.index');
    }
}
