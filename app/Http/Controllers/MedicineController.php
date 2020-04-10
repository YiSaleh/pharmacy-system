<?php

namespace App\Http\Controllers;

use App\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index()
    {
        $medicines= Medicine::find()->paginate(5);
        return view('medicines.index',[
            'medicines'=>$medicines,
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

}
