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
            'name'=>'required|min:3',
            'gender' => [
                'required',
                Rule::in(['male', 'female']),
            ],
            'email' => 'required|email:rfc,dns',
            'password'=>'required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/i',
            'phone'=>'required|size:11|numeric',
            'national_id'=>'required|numeric|size:14',
            'password_confirmation'=>'required|same:password',
            'date_of_birth'=>'required|date',
            // 'profile_image'=>'required|image',  

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
