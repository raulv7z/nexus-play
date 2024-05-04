<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideogameRequest extends FormRequest
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
            'name' => 'required|string|max:60',
            'description' => 'required|string|max:120',
            'front_page' => 'nullable|string|max:60',
            'developer' => 'required|string|max:30',
            'genre' => 'required|string|max:30',  // Adjusted max length to 30
            'base_price' => 'required|numeric|min:0'
        ];
    }

}
