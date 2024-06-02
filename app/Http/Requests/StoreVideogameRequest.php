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
            'description' => 'required|string',
            'front_page' => 'required|mimes:jpeg,png,bmp,gif,svg,webp|max:4096',
            'distributor' => 'required|string|max:30',
            'genre' => 'required|string|max:30',
            'iva' => 'required|numeric|min:0|max:100',
            'base_amount' => 'required|numeric|min:0|max:200',
        ];
    }
}