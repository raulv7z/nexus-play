<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCartEntryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'cart_id' => 'required|exists:carts,id',
            'edition_id' => 'required|exists:editions,id',
            'quantity' => 'required|integer|min:1'
        ];
    }
}
