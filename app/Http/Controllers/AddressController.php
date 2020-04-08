<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserAddresses;
use App\User;
class AddressController extends Controller
{
    public function index()
    {
        $addresses= UserAddresses::orderBy('id','asc')->paginate(5);
        return view('addresses.index',[
            'useraddresses'=>$addresses,
            ]);
    }

    public function show()
    {
        return view('addresses.show',[
            'useraddress'=> UserAddresses::find(request()->useraddress),
        ]);
    }

    public function create()
    {   $users=User::role('user')->get();
        return view('addresses.create',[
            'users'=> $users,
        ]);
    }

    public function store()
    {    
        UserAddresses::create([
            'street_name' => request()->street_name,
            'floor_no' => request()->floor_no,
            'building_no' => request()->building_no,
            'flat_no'=> request()->flat_no,
            'user_id'=> request()->user_id,
            'is_main'=> request()->mainstreet ?  true : false ,
        ]);
        return redirect()->route('useraddresses.index');
    }

    public function edit()
    {   $users=User::role('user')->get();
        return view('addresses.edit',[
            'useraddress' => UserAddresses::find(request()->useraddress),
            'users' => $users,
        ]);
    }

    public function update()
    {
        UserAddresses::where('id',request()->useraddress)->update([
            'street_name' => request()->street_name,
            'floor_no' => request()->floor_no,
            'building_no' => request()->building_no,
            'flat_no'=> request()->flat_no,
            'user_id'=> request()->user_id,
            'is_main'=> request()->mainstreet ?  true : false ,
        ]);
        return redirect()->route('useraddresses.index');
    }

    public function destroy()
    {  
        UserAddresses::where('id',request()->useraddress)->delete();
        return redirect()->route('useraddresses.index');
    }
}
