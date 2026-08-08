<?php

namespace App\Http\Requests\ResourceLibrary;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreResourceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            /*
            |--------------------------------------------------------------------------
            | Core Resource Fields
            |--------------------------------------------------------------------------
            */

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'body' => [
                'required',
                'string',
            ],

            'resource_category_id' => [
                'required',
                'integer',
                Rule::exists('resource_categories', 'id')
                    ->where('is_active', true),
            ],

            'resource_type_id' => [
                'required',
                'integer',
                Rule::exists('resource_types', 'id')
                    ->where('is_active', true),
            ],

            'status' => [
                'required',
                Rule::in([
                    'active',
                    'archived',
                ]),
            ],

            'first_sent' => [
                'nullable',
                'date',
            ],

            /*
            |--------------------------------------------------------------------------
            | Series
            |--------------------------------------------------------------------------
            */

            'resource_series_id' => [
                'nullable',
                'integer',
                Rule::exists('resource_series', 'id'),
                'prohibited_with:new_series_name',
            ],

            'new_series_name' => [
                'nullable',
                'string',
                'max:255',
                'prohibited_with:resource_series_id',
            ],

            /*
            |--------------------------------------------------------------------------
            | Lineage
            |--------------------------------------------------------------------------
            */

            'based_on_resource_id' => [
                'nullable',
                'integer',
                Rule::exists('resources', 'id'),
            ],

            /*
            |--------------------------------------------------------------------------
            | Related Behaviors
            |--------------------------------------------------------------------------
            */

            'tricks' => [
                'nullable',
                'array',
            ],

            'tricks.*' => [
                'integer',
                'distinct',
                Rule::exists('tricks', 'id'),
            ],

            /*
            |--------------------------------------------------------------------------
            | Related Resources
            |--------------------------------------------------------------------------
            */

            'related_resources' => [
                'nullable',
                'array',
            ],

            'related_resources.*' => [
                'integer',
                'distinct',
                Rule::exists('resources', 'id'),
            ],
        ];
    }
}