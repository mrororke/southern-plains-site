<?php

namespace App\Http\Requests\TrickEvaluation;

use Illuminate\Foundation\Http\FormRequest;

class StoreTrickEvaluationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            // Owner Info
            'owner_name' => 'required|string|max:255',
            'email' => 'required|email:rfc,dns|max:255',

            // Primary Dog Info
            'dog_name' => 'required|string|max:100',
            'dog_number' => 'required|string|max:50',
            'trick_level' => 'required|in:Novice,Intermediate,Advanced,Performer,Elite Performer',

            // Evaluation Method
            'eval_method' => 'required|in:online,in-person',

            // Conditional fields
            'video_link' => 'required_if:eval_method,online|nullable|url|max:255',
            'scheduled_datetime' => 'required_if:eval_method,in-person|nullable|date',

            // Additional dogs
            'additional_dogs' => 'nullable|integer|min:0|max:10',

            'additional_dog_names' => 'nullable|array',
            'additional_dog_names.*' => 'required_with:additional_dog_names|string|max:100',

            'additional_dog_numbers' => 'nullable|array',
            'additional_dog_numbers.*' => 'required_with:additional_dog_numbers|string|max:50',

            'additional_dog_levels' => 'nullable|array',
            'additional_dog_levels.*' => 'required_with:additional_dog_levels|in:Novice,Intermediate,Advanced,Performer,Elite Performer',

            'additional_dog_video' => 'nullable|array',
            'additional_dog_video.*' => 'nullable|url|max:255',

            // Payment
            'payment_method' => 'required|in:Apple Pay,Venmo,PayPal',

            'total_fee' => 'required|numeric|min:0',
        ];
    }
}