<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePharmacyRequest extends FormRequest
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
    //     return [
    //         'title' => ['required','min:3',
    //         Rule::unique('posts', 'title')->ignore($this->post)],
    //         'description' => 'required|min:10',
    //         'user_id'=>'exists:users,id',
    //     ];
    // }
    // public function messages()
    // {
    //     return [
    //             'title.min' => 'Please the title has minimum of 3 chars',
    //             'title.required' => 'Please enter the title field',
    //             'title.unique' => 'This title already exits',
    //             'description.required' => 'Please enter the description field',
    //             'description.min' => 'Please the description has minimum of 10 chars',

    //         ];
    }
}
