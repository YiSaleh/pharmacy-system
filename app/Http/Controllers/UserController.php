<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Spatie\Permission\Models\Role;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function index()
    {
        $users=User::role('user')->orderBy('id','asc')->paginate(5);
        return view('users.index',['users'=> $users ]);
    }

    public function show()
    {
        return view('users.show',['user'=> User::find(request()->user) ]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUserRequest $req)
    {   
        $req['password'] = Hash::make($req->password);
        $user = User::create($req->validated());

        if ($req->file('profile_image')->isValid()) {
            $user->avatar= $req->profile_image->store('uploads','public');
            $user->save();
        }         

        $user->assignRole('user');
        return redirect()->route('users.index');
    }
    
    public function edit($user)
    {
        return view('users.edit',['user' => User::find($user)]);
    }

    public function update(UpdateUserRequest $request)
    {   
        if ($request->hasFile('profile_image') && $request->file('profile_image')->isValid())
        {
            $avatar= $request->profile_image->store('uploads','public');
        }else{
            $avatar=User::where('id',$request->user)->value('avatar');
        }
        
        $request['avatar'] = $avatar ;
        User::where('id',$request->user)->update($request);   
        return redirect()->route('users.index');
    }

    public function destroy()
    {    
        $avatar=User::where('id',request()->user)->value('avatar');
        File::delete(storage_path().'/app/public/'.$avatar);
        User::where('id',request()->user)->delete();
        return redirect()->route('users.index');
    }
}