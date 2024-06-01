<?php

namespace App\Http\Requests;

use App\Models\Videogame;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateVideogameRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $videogameId = $this->route('videogame');

        return [
            'name' => [
                'sometimes', 'string', 'max:60',
                Rule::unique('videogames')->ignore($videogameId),
            ],
            'description' => 'sometimes|string|max:120',
            'front_page' => 'sometimes|mimes:jpeg,png,bmp,gif,svg,webp|max:4096',
            'distributor' => 'sometimes|string|max:30',
            'genre' => 'sometimes|string|max:30',
            'iva' => 'sometimes|numeric|min:0|max:100',
            'base_amount' => 'sometimes|numeric|min:0|max:200',
        ];
    }
}
