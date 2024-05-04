<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlatformRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'sometimes|string|max:30',
            'plus' => 'sometimes|numeric',
            'platform_group_id' => 'nullable|exists:platform_groups,id',
        ];
    }
}
