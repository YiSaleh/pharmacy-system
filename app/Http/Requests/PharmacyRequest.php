<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class PharmacyRequest extends FormRequest
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
           'name' => 'required',
            'periority' => 'required',
            'area_id'=>'exists:areas,id',
        ];
    }
    public function messages()
    {
        return [
                'name.required' => 'Please enter the Name field',
                'title.unique' => 'This title already exits',
                'periority.required' => 'Please enter the periority',
                'area_id.required' => 'Please the choose an area',

            ];
    }
}
