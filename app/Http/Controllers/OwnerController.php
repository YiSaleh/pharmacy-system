<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\User;
use Spatie\Permission\Models\Role;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class OwnerController extends Controller
{

public function index()
    {
       $owners=User::role('owner')->orderBy('id','asc')->paginate(5);
        return view('owners.index',[
            'owners'=> $owners,
        ]);
    }

     public function show()
    {
        return view('owners.show',[
            'owner'=> User::find(request()->owner),
        ]);
    }
    public function create()
    {
        return view('owners.create');
    }

    public function store(StoreUserRequest $req)
    {   
        $owner = new User();
        if ($req->file('profile_image')->isValid()) {
            $owner->avatar= $req->profile_image->store('uploads','public');
        }         
        
        $owner->name = $req->name;
        $owner->email = $req->email;
        $owner->gender = $req->gender;
        $owner->password =Hash::make($req->password);
        $owner->date_of_birth = $req->date_of_birth;
        $owner->phone = $req->phone;
        $owner->national_id = $req->national_id;

        $owner->save();
        $role=Role::find(2);
        $owner->assignRole($role);
        return redirect()->route('owners.index');
    }
    public function edit($owner)
    {
        return view('owners.edit',[
            'owner' => User::find($owner),
        ]);
    }

    public function update(UpdateUserRequest $request)
    {   
        if ($request->hasFile('profile_image')) {
            $request->file('profile_image')->isValid();
            $avatar= $request->profile_image->store('uploads','public');
        }else{
             $avatar=User::where('id',$request->owner)->value('avatar');
        }

        User::where('id',$request->owner)->update([
            'name'=>$request->name,
            'gender'=>$request->gender,
            'password'=> Hash::make($request->password),
            'date_of_birth'=> $request->date_of_birth,
            'phone'=>  $request->phone,
            'national_id'=>  $request->national_id,
            'avatar'=>$avatar,
        ]);   
         return redirect()->route('owners.index');
     }
     public function destroy()
    {    
        $avatar=User::where('id',request()->owner)->value('avatar');
        File::delete(storage_path().'/app/public/'.$avatar);
        User::where('id',request()->owner)->delete();
        return redirect()->route('owners.index');
    }
}