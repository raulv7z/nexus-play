<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePlatformRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:30',
            'plus' => 'required|numeric',
            'platform_group_id' => 'nullable|exists:platform_groups,id',
        ];
    }
}
