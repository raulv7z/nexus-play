<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCartStateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'state' => 'sometimes|string|max:60|unique:cart_states,state,' . $this->cart_state,
        ];
    }
}