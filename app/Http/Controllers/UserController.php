<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()
    {
       $users=User::orderBy('id','asc')->paginate(5);
        return view('users.index',[
            'users'=> $users,
        ]);
    }

    public function show()
    {
        $user=User::find(request()->user);
        return view('users.show',[
            'user'=> $user,
        ]);
    }

    public function destroy()
    {
        User::where('id',request()->user)->delete();
        return redirect()->route('users.index');
    }
}
