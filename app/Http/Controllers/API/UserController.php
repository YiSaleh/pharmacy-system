<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Notification\UserVerified;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function store(StoreUserRequest $request)
    {
        $request['password'] = Hash::make($request->password);
        $user = User::create($request->validated());
        if ($request->file('avatar')->isValid()) {
            $user->avatar= $request->avatar->store('uploads','public');
            $user->save();
        }         
        
        $user->assignRole('user');
        event(new Registered($user));
        return response()->json(['status'=>"success"]);
    }

    public function login(Request $request )
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required'    
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        } 
        return response()->json(['User Info'=>$user,'Access Token'=>$user->createToken($request->device_name)->plainTextToken]);
    }
    
    public function update(UpdateUserRequest $request )
    {
        if ($request->file('avatar')->isValid()) {
            $request['avatar']= $request->avatar->store('uploads','public');
        }  
        User::find($request->user)->update($request->validated());
        return response()->json(['status'=>'your data has been updated']);
    }
}
