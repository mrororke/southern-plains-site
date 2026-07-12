<?php

namespace App\Http\Requests\TeachingLibrary;

use Illuminate\Foundation\Http\FormRequest;

class StoreResourceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'internal_title' => [
                'required',
                'string',
                'max:255',
            ],

            'email_subject' => [
                'required',
                'string',
                'max:255',
                'different:internal_title',
            ],

            'resource_category_id' => [
                'required',
                'exists:resource_categories,id',
            ],

            'status' => [
                'required',
                'in:draft,published,archived',
            ],

            'is_template' => [
                'nullable',
                'boolean',
            ],

            'body' => [
                'nullable',
                'string',
            ],
        ];
    }
}
