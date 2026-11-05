<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventV2Request extends FormRequest
{
    /**
     * Determine whether the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'type' => [
                'required',
                'string',
                'in:dog_sports,training,workshop,class,community,other',
            ],

            'status' => [
                'required',
                'string',
                'in:draft,published,cancelled',
            ],

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'short_description' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'description' => [
                'required',
                'string',
            ],

            'featured_image' => [
                'nullable',
                'image',
                'max:10240',
            ],

            'featured_image_alt' => [
                'nullable',
                'string',
                'max:255',
            ],

            'featured_image_credit' => [
                'nullable',
                'string',
                'max:255',
            ],

            'featured_image_credit_url' => [
                'nullable',
                'url',
                'max:2048',
            ],

            'start_date' => [
                'required',
                'date',
            ],

            'end_date' => [
                'nullable',
                'date',
                'after_or_equal:start_date',
            ],

            'start_time' => [
                'nullable',
                'date_format:H:i',
            ],

            'end_time' => [
                'nullable',
                'date_format:H:i',
            ],

            'venue_name' => [
                'nullable',
                'string',
                'max:255',
            ],

            'address' => [
                'nullable',
                'string',
                'max:255',
            ],

            'city' => [
                'required',
                'string',
                'max:255',
            ],

            'state' => [
                'required',
                'string',
                'max:255',
            ],

            'is_private_location' => [
                'nullable',
                'boolean',
            ],

            'location_details' => [
                'nullable',
                'string',
                'max:5000',
            ],

            'registration_status' => [
                'required',
                'string',
                'in:not_required,open,coming_soon,closed',
            ],

            'registration_method' => [
                'nullable',
                'string',
                'in:on-site,external',
            ],

            'registration_url' => [
                'nullable',
                'url',
                'max:2048',
            ],

            'registration_deadline' => [
                'nullable',
                'date',
            ],

            'registration_notes' => [
                'nullable',
                'string',
                'max:5000',
            ],

            'working_capacity' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'auditor_capacity' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'working_price' => [
                'nullable',
                'numeric',
                'min:0',
                'max:99999999.99',
            ],

            'auditor_price' => [
                'nullable',
                'numeric',
                'min:0',
                'max:99999999.99',
            ],

            'what_to_expect' => [
                'nullable',
                'string',
            ],

            'what_to_bring' => [
                'nullable',
                'string',
            ],

            'requirements_notes' => [
                'nullable',
                'string',
            ],

            'cta_label' => [
                'nullable',
                'string',
                'max:255',
            ],

            'cta_url' => [
                'nullable',
                'url',
                'max:2048',
            ],

            'seo_title' => [
                'nullable',
                'string',
                'max:255',
            ],

            'seo_description' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'published_at' => [
                'nullable',
                'date',
            ],
        ];
    }
}