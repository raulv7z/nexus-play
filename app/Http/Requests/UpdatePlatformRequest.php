<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePlatformRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $platformId = $this->route('platform');
        
        return [
            'name' => [
                'sometimes', 'string', 'max:30',
                Rule::unique('platforms')->ignore($platformId),
            ],
            'plus' => 'sometimes|numeric|min:1|max:100',
            'platform_group_id' => 'sometimes|exists:platform_groups,id',
        ];
    }
}
