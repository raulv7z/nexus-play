<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Cambiar a la lógica de autorización apropiada
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'rating' => 'required|numeric|min:0|max:5',
            'comment' => 'required|string|min:120|max:255',
            'verified' => 'boolean',
            'user_id' => 'required|exists:users,id',
            'edition_id' => 'required|exists:editions,id',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'user_id' => auth()->id(),
        ]);

        $editionId = $this->input('edition_id');
        $verified = $this->user()->hasBoughtEdition($editionId);
        $this->merge(['verified' => $verified]);
    }
}
