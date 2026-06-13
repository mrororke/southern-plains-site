<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

class BlogIndexRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'search' => ['nullable', 'string', 'max:100'],
            'category' => ['nullable', 'string', 'max:100'],
        ];
    }

    public function sanitize(): array
    {
        return [
            'search' => $this->cleanString($this->search),
            'category' => $this->cleanString($this->category),
        ];
    }

    private function cleanString($value): ?string
    {
        if (!$value) {
            return null;
        }

        $value = trim($value);

        return $value !== '' ? $value : null;
    }

    /**
     * Convenience method used by controller
     */
    public function filters(): array
    {
        $validated = $this->validated();

        return [
            'search' => $validated['search'] ?? null,
            'category' => $validated['category'] ?? null,
        ];
    }
}