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
        return view('addresses.index',['useraddresses'=>$addresses ]);
    }

    public function show()
    {
        return view('addresses.show',['useraddress'=> UserAddress::find(request()->useraddress)]);
    }

    public function create()
    {  
        return view('addresses.create',['users' => User::role('user')->get(),'areas' => Area::all()]);
    }

    public function store()
    {    
        UserAddress::create(request()->input());
        return redirect()->route('useraddresses.index');
    }

    public function edit()
    {  
        return view('addresses.edit',[
            'useraddress' => UserAddress::find(request()->useraddress),
            'users' => User::role('user')->get(),
            'areas' => Area::all(),
        ]);
    }

    public function update()
    {
        UserAddress::where('id',request()->useraddress)->update(request()->all());
        return redirect()->route('useraddresses.index');
    }

    public function destroy()
    {  
        UserAddress::where('id',request()->useraddress)->delete();
        return redirect()->route('useraddresses.index');
    }
}