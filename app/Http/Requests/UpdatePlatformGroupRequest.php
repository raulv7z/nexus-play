<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePlatformGroupRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $platformGroupId = $this->route('platformGroup');

        return [
            'name' => [
                'sometimes', 'string', 'max:30',
                Rule::unique('platform_groups')->ignore($platformGroupId),
            ],
        ];
    }
}
