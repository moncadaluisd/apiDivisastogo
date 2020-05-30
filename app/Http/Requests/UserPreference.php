<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPreference extends FormRequest
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
            'notificactions_web' => 'required|integer',
            'notifications_movil' => 'required|integer',
            'notifications_email' => 'required|integer',
            '2fa' => 'required|integer'
        ];
    }
}
