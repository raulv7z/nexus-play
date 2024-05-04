<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCartRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'cart_state_id' => 'required|exists:cart_states,id',
            'iva' => 'required|numeric',
            'base_amount' => 'required|numeric|min:0',
            'full_amount' => 'required|numeric|min:0',
            'purchased_at' => 'nullable|date'
        ];
    }
}