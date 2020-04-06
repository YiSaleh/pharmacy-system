<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserAddresses;

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
        $address=UserAddresses::find(request()->useraddress);
        return view('addresses.show',[
            'useraddress'=> $address,
        ]);
    }

    public function destroy()
    {
        UserAddresses::where('id',request()->useraddress)->delete();
        return redirect()->route('addreses.index');
    }
}
