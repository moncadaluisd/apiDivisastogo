<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserDataRequest extends FormRequest
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
              'avatar'  => '',
              'first_name'  => 'required|string|max:100',
              'last_name'  => 'required|string|max:100',
              'birth_date'  => 'required',
              'dni'  => 'required|string|max:40',
              'country'  => 'required|string|max:80',
              'state'  => 'required|string|max:80',
              'zip'  => 'required|string|max:8',
              'address'  => 'required|string',
              'photo_dni'  => '',
              'photo_selfie'  => ''
        ];
    }
}
