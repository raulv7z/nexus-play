<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCartEntryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'cart_id' => 'sometimes|exists:carts,id',
            'edition_id' => 'sometimes|exists:editions,id',
            'quantity' => 'sometimes|integer|min:1'
        ];
    }
}
