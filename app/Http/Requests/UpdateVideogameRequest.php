<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVideogameRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'sometimes|string|max:60|unique:videogames,name,' . $this->videogame->id,
            'description' => 'sometimes|string|max:120',
            'front_page' => 'sometimes|string|max:60',
            'developer' => 'sometimes|string|max:30',
            'genre' => 'sometimes|string|max:30',
            'base_price' => 'sometimes|numeric|min:0'
        ];
    }
}
