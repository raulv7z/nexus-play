<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

//? not used
class StoreInvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'user_id' => 'required|exists:users,id',
            'code_invoice' => 'required|unique:invoices,code_invoice',
            'issued_at' => 'required|date',
            'base_amount' => 'required|numeric|min:0',
            'full_amount' => 'required|numeric|min:0',
            'currency' => 'required|string|max:3',
        ];
    }
}
