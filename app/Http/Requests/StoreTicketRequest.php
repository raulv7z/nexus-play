<?php

namespace App\Http\Requests;

use App\Models\TicketState;
use Illuminate\Foundation\Http\FormRequest;

class StoreTicketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'ticket_state_id' => 'required|exists:ticket_states,id',
            'code_ticket' => 'required|string|unique:tickets,code_ticket',
            'name' => 'required|string|max:30',
            'email' => 'required|email|max:255',
            'message' => 'required|string|min:120',
            'issued_at' => 'required|date',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'issued_at' => now(),
            'code_ticket' => strtoupper(uniqid()),
            'ticket_state_id' => TicketState::where('state->en', 'Open')->first()->id,
        ]);
    }
}
