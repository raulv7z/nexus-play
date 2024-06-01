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
            'name' => 'required|string|max:30|unique:platforms,name',
            'plus' => 'required|numeric|min:1|max:100',
            'platform_group_id' => 'required|exists:platform_groups,id',
        ];
    }
}