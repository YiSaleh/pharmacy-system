<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Spatie\Permission\Models\Role;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class OwnerController extends Controller
{

    public function index()
    {
        $owners=User::role('owner')->orderBy('id','asc')->paginate(5);
         return view('owners.index',['owners'=> $owners ]);
    }

    public function show()
    {
        return view('owners.show',['owner'=> User::find(request()->owner) ]);
    }

    public function create()
    {
        return view('owners.create');
    }

    public function store(StoreUserRequest $req)
    {   
        $req['password'] = Hash::make($req->password);
        $owner = User::create($req->validated());
        if ($req->file('profile_image')->isValid()) {
            $owner->avatar= $req->profile_image->store('uploads','public');
            $owner->save();
        }         
        $owner->assignRole('owner');
        return redirect()->route('owners.index');
    }

    public function edit($owner)
    {
        return view('owners.edit',['owner' => User::find($owner)]);
    }

    public function update(UpdateUserRequest $request)
    {   
        if ($request->hasFile('profile_image') && $request->file('profile_image')->isValid())
        {
            $request['avatar'] = $request->profile_image->store('uploads','public');
        }

        User::where('id',$request->owner)->update($request->validated());  
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