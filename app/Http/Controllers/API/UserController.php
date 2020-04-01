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
        
        $user_valid=request()->validate([
            'name'=>'required|min:3|string',
            'gender' => [
                'required',
                Rule::in(['Male', 'Female']),
            ],
            'email' => 'required|email:rfc,dns|unique:users',
            'password'=>'required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/i',
            'phone'=>'required|min:11|max:11|numeric',
            'national_id'=>'required|numeric|min:14|max:14|unique:users',
            'password_confirmation'=>'required|same:password',
            'date_of_birth'=>'required|date',
            'profile_image'=>'required|image',  

        ],[
            'name.min'=>'your name should be at least 3 characters',
            'gender.in'=>'your gender must be like (Male) or (Female)',
            'email.unique'=>'this email is already exists',
            'password.regex'=>'your password must be at least 8 characters and include at least one upper character, one lower character ,one number and one special character ',
            'phone'=>'your phone number must be 11 number',
        ]);

        // $image_path=$user_valid->file('profile_image')->path;
 
        // if ($request->file('profile_image')->isValid()) {
        //     $image = $request->profile_image->path();
        // }
        // $request=request();
        // $user = new User();
        // $user->name=$request->name;
        // $user->email=$request->email;
        // $user->gender=$request->gender;
        // $user->password=$request->password;
        // $user->date_of_birth=$request->date_of_birth;
        // $user->avatar=$request->profile_image;
        // $user->phone=$request->phone;
        // $user->national_id=$request->national_id;

        // $user->save();
        return response()->json($user_valid);

    }
}
