<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserAddress;
use App\User;
use App\Area;

class AddressController extends Controller
{
    public function index()
    {
        $addresses= UserAddress::orderBy('id','asc')->paginate(10);
        return view('addresses.index',['userAddresses'=>$addresses ]);
    }

    public function show()
    {
        return view('addresses.show',['userAddress'=> UserAddress::find(request()->userAddress)]);
    }

    public function create()
    {  
        return view('addresses.create',['users' => User::role('user')->get(),'areas' => Area::all()]);
    }

    public function store()
    {    
        UserAddress::create(request()->input());
        return redirect()->route('userAddresses.index');
    }

    public function edit()
    {  
        return view('addresses.edit',[
            'userAddress' => UserAddress::find(request()->userAddress),
            'users' => User::role('user')->get(),
            'areas' => Area::all(),
        ]);
    }

    public function update(Request $request)
    { 
        UserAddress::find(request()->userAddress)->fill(request()->all())->save();
        return redirect()->route('userAddresses.index');
    }

    public function destroy()
    {  
        UserAddress::where('id',request()->userAddress)->delete();
        return redirect()->route('userAddresses.index');
    }
}