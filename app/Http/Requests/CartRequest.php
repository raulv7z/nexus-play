<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Considerar la lógica para autorizar si el usuario puede realizar esta operación
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'user_id' => 'required|exists:users,id',
            'iva' => 'required|numeric|between:0,100',
            'base_amount' => 'required|numeric|min:0',
            'full_amount' => 'required|numeric|min:0',
            'status' => 'required|string|in:pending,completed,canceled',
        ];

        if ($this->isMethod('post')) { // Creating a new cart
            $rules['purchased_at'] = 'nullable|date';
        } elseif ($this->isMethod('put')) { // Updating an existing cart
            $rules['purchased_at'] = 'required|date';
        }

        return $rules;
    }
}