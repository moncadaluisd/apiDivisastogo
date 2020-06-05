<?php

namespace App\Http\Requests\Announcement;

use Illuminate\Foundation\Http\FormRequest;

class AnnouncementRequest extends FormRequest
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
            'id_currency_from' => 'required',
            'id_currency_to' => 'required',
            'id_category' => 'required',
            'title' => 'required|string|max:100',
            'description' => 'required',
            'price' => 'required',
            'min' => 'required',
            'max' => 'required'
        ];
    }
}
