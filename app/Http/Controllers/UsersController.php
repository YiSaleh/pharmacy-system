<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\User;
use Spatie\Permission\Models\Role;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;


class UsersController extends Controller
{
    public function index()
    {
       $users=User::role('user')->orderBy('id','asc')->paginate(5);
        return view('users.index',[
            'users'=> $users,
        ]);
    }

    public function show()
    {
        return view('users.show',[
            'user'=> User::find(request()->user),
        ]);
    }

    // function to create new user
    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUserRequest $req)
    {   
        $user = new User();
        if ($req->file('profile_image')->isValid()) {
            $user->avatar= $req->profile_image->store('uploads','public');
        }         
        
        $user->name = $req->name;
        $user->email = $req->email;
        $user->gender = $req->gender;
        $user->password =Hash::make($req->password);
        $user->date_of_birth = $req->date_of_birth;
        $user->phone = $req->phone;
        $user->national_id = $req->national_id;

        $user->save();
        $role=Role::find(4);
        $user->assignRole($role);
        return redirect()->route('users.index');
    }
    
    public function edit($user)
    {
        return view('users.edit',[
            'user' => User::find($user),
        ]);
    }

    public function update(UpdateUserRequest $request)
    {   
        
        if ($request->hasFile('profile_image')) {
            $request->file('profile_image')->isValid();
            $avatar= $request->profile_image->store('uploads','public');
        }else{
             $avatar=User::where('id',$request->user)->value('avatar');
        }

        User::where('id',$request->user)->update([
            'name'=>$request->name,
            'gender'=>$request->gender,
            'password'=> Hash::make($request->password),
            'date_of_birth'=> $request->date_of_birth,
            'phone'=>  $request->phone,
            'national_id'=>  $request->national_id,
            'avatar'=>$avatar,
        ]);   

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
