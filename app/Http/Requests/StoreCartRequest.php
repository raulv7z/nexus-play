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
            'iva' => 'required|numeric',
            'base_amount' => 'required|numeric|min:0',
            'full_amount' => 'required|numeric|min:0',
            'status' => 'required|string|max:30',
            'purchased_at' => 'required|date'
        ];
    }
}
