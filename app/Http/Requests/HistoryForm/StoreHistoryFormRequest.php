<?php

namespace App\Http\Requests\HistoryForm;

use Illuminate\Foundation\Http\FormRequest;

class StoreHistoryFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            // Owner Information
            'first_name'        => ['required', 'string', 'max:100'],
            'last_name'         => ['required', 'string', 'max:100'],
            'email'             => ['required', 'email', 'max:100'],
            'phone'             => ['required', 'string', 'max:20'],
            'preferred_contact' => ['required', 'in:email,phone,text'],
            'area'              => ['required', 'string', 'max:100'],
            'referred'         => ['nullable', 'string', 'max:100'],

            // Dog Info
            'dog_name'         => ['required', 'string', 'max:100'],
            'dog_breed'        => ['required', 'string', 'max:100'],
            'dog_age'          => ['required', 'string', 'max:100'],
            'gender'           => ['required', 'in:male,neutered,female,spayed'],

            // Free text sections
            'how_can_i_help'    => ['required', 'string', 'min:10', 'max:2500'],
            'home_occupants'    => ['required', 'string', 'max:2500'],
            'timeline'          => ['required', 'string', 'min:10', 'max:2500'],
            'dog_living'        => ['required', 'string', 'min:10', 'max:2500'],
            'bite_history'      => ['required', 'string', 'min:10', 'max:2500'],
            'visitor_reaction'  => ['required', 'string', 'min:10', 'max:2500'],
            'visitor_time'      => ['required', 'string', 'min:10', 'max:2500'],
        ];
    }
}