<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            "name" => "required|max:30|min:8",
            "address" => "required",
            "phone" => "required",
            "national_id" => "min:14|max:14",
            "tax_record" => "min:14|max:14",
        ];
    }
    public function messages()
    {
        return [
            'address.required'     => __('address required'),
            'name.required'        => __('name required'),
            'name.max'             => __('max num of string is 30 chars'),
            'name.min'             => __('minimum num of string is 8 chars'),
            'phone.required'       => __('phone required'),

        ];
    }
}
