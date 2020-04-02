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
use Illuminate\Validation\ValidationException;




class UserController extends Controller
{
    public function store(StoreUserRequest $user_valid)
    {
     
        $user = new User();
        if ($user_valid->file('profile_image')->isValid()) {
            $user->avatar= $user_valid->profile_image->store('uploads','public');
        }         
        
        $user->name = $user_valid->name;
        $user->email = $user_valid->email;
        $user->gender = $user_valid->gender;
        $user->password =Hash::make($user_valid->password);
        $user->date_of_birth = $user_valid->date_of_birth;
        $user->phone = $user_valid->phone;
        $user->national_id = $user_valid->national_id;

        $user->save();

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
}
