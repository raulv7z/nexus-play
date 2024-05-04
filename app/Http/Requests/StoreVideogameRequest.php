<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVideogameRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:60|unique:videogames,name',
            'description' => 'required|string|max:120',
            'front_page' => 'sometimes|string|max:60',  // Optional with a default value
            'developer' => 'required|string|max:30',
            'genre' => 'required|string|max:30',
            'base_price' => 'required|numeric|min:0'
        ];
    }
}