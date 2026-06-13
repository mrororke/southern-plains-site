<?php

namespace App\Http\Requests\Rats;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRatRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:150',
            'registered_name' => 'nullable|string|max:255',
            'breeder_reference' => 'nullable|string|max:10',

            'sire_id' => 'nullable|exists:rats,id',
            'dam_id' => 'nullable|exists:rats,id',

            'sex' => 'required|in:Male,Female',
            'dob' => 'nullable|date',
            'dod' => 'nullable|date',

            'variety' => 'required|string',
            'silvered' => 'nullable|string',
            'eye_color' => 'required|string',
            'ear_set' => 'required|string',

            'breeder_id' => 'nullable|exists:rat_breeders,id',

            'colors' => 'required|array',
            'colors.*' => 'exists:rat_colors,id',

            'markings' => 'required|array',
            'markings.*' => 'exists:rat_markings,id',
        ];
    }
}