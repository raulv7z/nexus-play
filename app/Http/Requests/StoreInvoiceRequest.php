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
            'invoice_number' => 'required|unique:invoices,invoice_number',
            'issued_at' => 'required|date',
            'total_amount' => 'required|numeric|min:0',
            'currency' => 'required|string|max:3',
        ];
    }
}
