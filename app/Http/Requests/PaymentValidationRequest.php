<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentValidationRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Permitir la validación para todos los usuarios
    }

    public function rules()
    {
        return [
            'card_number' => 'required|numeric|digits:16|luhn_credit_card',
            'expiration_date' => 'required|date_format:m/y|after_or_equal:today',
            'cvc' => 'required|digits:3',
        ];
    }

    public function messages()
    {
        return [
            'card_number.required' => 'El número de tarjeta de crédito es obligatorio',
            'card_number.numeric' => 'El número de tarjeta de crédito debe ser numérico',
            'card_number.digits' => 'El número de tarjeta de crédito debe tener :digits dígitos',
            'card_number.luhn_credit_card' => 'El número de tarjeta de crédito no es válido',
        ];
    }

    protected function prepareForValidation()
    {
        // Eliminar los guiones del número de tarjeta
        $this->merge([
            'card_number' => str_replace('-', '', $this->card_number),
        ]);
    }
}
