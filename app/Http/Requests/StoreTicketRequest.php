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
            'ticket_state_id' => TicketState::where('state', 'Open')->first()->id,
        ]);
    }

    /**
     * Get the custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'ticket_state_id.required' => 'The ticket state is required.',
            'ticket_state_id.exists' => 'The selected ticket state does not exist.',
            'code_ticket.required' => 'The ticket code is required.',
            'code_ticket.unique' => 'The ticket code has already been taken.',
            'code_ticket.max' => 'The ticket code may not be greater than 10 characters.',
            'name.required' => 'The name is required.',
            'name.max' => 'The name may not be greater than 30 characters.',
            'email.required' => 'The email is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.max' => 'The email may not be greater than 255 characters.',
            'message.required' => 'The message is required.',
            'message.min' => 'The message may not be smaller than 120 characters.',
            'issued_at.required' => 'The issued at date is required.',
            'issued_at.date' => 'The issued at must be a valid date.',
        ];
    }
}
