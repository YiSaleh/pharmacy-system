<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class StoreUserRequest extends FormRequest
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
        return [
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
        ];
    }

    public function messages()
{
    return [
            'name.min'=>'your name should be at least 3 characters',
            'gender.in'=>'your gender must be like (Male) or (Female)',
            'email.unique'=>'this email is already exists',
            'password.regex'=>'your password must be at least 8 characters and include at least one character ,one number and one special character ',
            'phone.regex'=>'your phone number must be 11 number',
    ];
}
}
