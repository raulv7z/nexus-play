<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEditionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'platform_id' => 'required|exists:platforms,id',
            'videogame_id' => 'required|exists:videogames,id',
            'amount' => 'required|numeric',
            'stock' => 'sometimes|numeric|min:0'
        ];
    }
}
