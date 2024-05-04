<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartEntryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Suponiendo que cualquier usuario autenticado pueda modificar sus entradas de carrito
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cart_id' => 'required|exists:carts,id',
            'edition_id' => 'required|exists:editions,id',
            'quantity' => 'required|integer|min:1'
        ];
    }
}
