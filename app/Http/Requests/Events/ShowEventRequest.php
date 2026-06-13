<?php

namespace App\Http\Requests\Events;

use Illuminate\Foundation\Http\FormRequest;

class ShowEventRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [];
    }
}