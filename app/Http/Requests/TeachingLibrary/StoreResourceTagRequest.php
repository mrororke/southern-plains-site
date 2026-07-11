<?php

namespace App\Http\Requests\TeachingLibrary;

use Illuminate\Foundation\Http\FormRequest;

class StoreResourceTagRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules():array{
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:resource_tags,name',
            ],
        ];

    }
}
