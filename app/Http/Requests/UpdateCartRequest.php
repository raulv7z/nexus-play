<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCartRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => 'sometimes|exists:users,id',
            'cart_state_id' => 'sometimes|exists:cart_states,id',
            'iva' => 'sometimes|numeric',
            'base_amount' => 'sometimes|numeric|min:0',
            'full_amount' => 'sometimes|numeric|min:0',
            'purchased_at' => 'nullable|date'
        ];
    }
}