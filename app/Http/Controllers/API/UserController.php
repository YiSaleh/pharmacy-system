<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    public function store()
    {
        $user_valid=request();
        $user_valid->validate([
            'name'=>'required|min:3|string',
            'gender' => [
                'required',
                Rule::in(['Male', 'Female']),
            ],
            'email' => 'required|email:rfc,dns|unique:users',
            'password'=>'required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/i',
            'phone'=>'required|regex:/^(?=.*?[0-9]).{11}$/i|numeric',
            'national_id'=>'required|regex:/^(?=.*?[0-9]).{14}$/i|numeric|unique:users',
            'password_confirmation'=>'required|same:password',
            'date_of_birth'=>'required|date',
            'profile_image'=>'required|image',  

        ],[
            'name.min'=>'your name should be at least 3 characters',
            'gender.in'=>'your gender must be like (Male) or (Female)',
            'email.unique'=>'this email is already exists',
            'password.regex'=>'your password must be at least 8 characters and include at least one character ,one number and one special character ',
            'phone.regex'=>'your phone number must be 11 number',
        ]);

        $user = new User();
        if ($user_valid->file('profile_image')->isValid()) {
            $user->avatar= $user_valid->profile_image->store('uploads','public');
        }

        // $path = $request->photo->store('images');
         
        
        $user->name = $user_valid->name;
        $user->email = $user_valid->email;
        $user->gender = $user_valid->gender;
        $user->password = $user_valid->password;
        $user->date_of_birth = $user_valid->date_of_birth;
        $user->phone = $user_valid->phone;
        $user->national_id = $user_valid->national_id;

        $user->save();
        return response()->json(['status'=>"success"]);

    }
}
