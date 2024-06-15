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
            'iban' => 'required|numeric|digits:16|luhn_credit_card',
            'expiration_date' => 'required|date_format:m/y|after_or_equal:today',
            'cvc' => 'required|digits:3',
        ];
    }

    public function messages()
    {
        return [
            'iban.luhn_credit_card' => 'El campo IBAN no es válido.',
        ];
    }

    protected function prepareForValidation()
    {
        // Eliminar los guiones del número de tarjeta
        $this->merge([
            'iban' => str_replace('-', '', $this->iban),
        ]);
    }
}
