<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
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
            'old_password' => 'required',
            'current_password' => 'required|min:8',
            'Confirm_current_password' => 'required|same:current_password',

        ];
    }

    public function messages()
    {
        return [
            'old_password.required'    => __('password required'),
            'current_password.required'    => __('password confirmation required'),
            'current_password.min'    => __('password is weak '),
            'Confirm_current_password.same'    => __('password confirmation not as Password'),

        ];
    }

}
