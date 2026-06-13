<?php

namespace App\Http\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email:rfc,dns'],
            'contact_phone' => ['nullable', 'string', 'max:20'],
            'inquiry_type' => ['required', 'string'],
            'is_member' => ['nullable', 'string'],
            'message' => ['required', 'string', 'min:10'],
        ];
    }
}