<?php

namespace App\Http\Requests\TeachingLibrary;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateResourceTagRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array{
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('resource_tags', 'name')->ignore($this->tag),
            ],
            
        ];
    }
}
