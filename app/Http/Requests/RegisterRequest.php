<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|unique:users,name|min:5|max:20',
            'kind' => 'required',
            'address' => 'required',
            'phone' => 'required|max:15',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password'

        ];
    }
    public function messages()
    {
        return [
            'address.required'     => __('address required'),
            'name.required'        => __('name required'),
            'name.max'             => __('max num of string is 20 chars'),
            'phone.required'       => __('phone required'),
            'password.required'    => __('password required'),
            'password_confirmation.required'    => __('password confirmation required'),
            'password_confirmation.same'    => __('password confirmation not as Password'),

        ];
    }
}
