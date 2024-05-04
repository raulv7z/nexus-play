<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEditionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'platform_id' => 'sometimes|exists:platforms,id',
            'videogame_id' => 'sometimes|exists:videogames,id',
            'amount' => 'sometimes|numeric',
            'stock' => 'sometimes|numeric|min:0'
        ];
    }
}
