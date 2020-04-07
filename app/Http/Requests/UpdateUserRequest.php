<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user= $this->user();
        
         return [
        
                'name'=>'min:3|string',
                'email'=>'unique:users',
                'gender' => [
                     
                    Rule::in(['Male', 'Female']),
                ],
                'password'=>'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/i',
                'phone'=>'regex:/^(?=.*?[0-9]).{11}$/i|numeric',
                'national_id'=>['regex:/^(?=.*?[0-9]).{14}$/i','numeric',
                                Rule::unique('users')->ignore($user->id)],
                'password_confirmation'=>'same:password',
                'date_of_birth'=>'date',
                'profile_image'=>'image',  
            
        ];
    }
    public function messages()
    {
        return [
                'name.min'=>'your name should be at least 3 characters',
                'gender.in'=>'your gender must be like (Male) or (Female)',
                'email.unique'=>'you can not change your email',
                'password.regex'=>'your password must be at least 8 characters and include at least one character ,one number and one special character ',
                'phone.regex'=>'your phone number must be 11 number',
        ];
    }
}
