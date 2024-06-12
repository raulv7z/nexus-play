<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendTicketResponseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'reply' => ['required', 'string', 'min:120'],
        ];
    }
}
