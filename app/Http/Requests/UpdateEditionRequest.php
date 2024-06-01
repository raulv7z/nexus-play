<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Edition;

class UpdateEditionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'platform_id' => 'sometimes|exists:platforms,id',
            'videogame_id' => 'sometimes|exists:videogames,id',
            'stock' => 'sometimes|numeric|min:0',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {

            $platformId = $this->input('platform_id');
            $videogameId = $this->input('videogame_id');
            $editionId = $this->input('edition_id');

            // Verificar si tanto platform_id como videogame_id están presentes
            if ($platformId && $videogameId) {

                // Buscar una edición existente con la misma combinación de platform_id y videogame_id
                $existingEdition = Edition::where('platform_id', $platformId)
                    ->where('videogame_id', $videogameId)
                    ->where('id', '!=', $editionId)
                    ->first();

                // Si se encuentra una edición, agregar un error de validación
                if ($existingEdition) {
                    $validator->errors()->add('platform_id', 'The combination of platform and videogame already exists.');
                    $validator->errors()->add('videogame_id', 'The combination of platform and videogame already exists.');
                }
            }
        });
    }
}