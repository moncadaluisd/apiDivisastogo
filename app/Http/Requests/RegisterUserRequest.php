<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
            //
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|max:100|confirmed',
            'username' => 'required|string|min:6|max:20|unique:users',
            'phone' => 'required|string|max:20|unique:users',

        ];
    }
}
