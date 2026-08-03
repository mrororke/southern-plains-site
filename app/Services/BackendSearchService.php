<?php

namespace App\Services;

use App\Models\Trick;
use Illuminate\Support\Collection;

class BackendSearchService
{
    /**
     * Search the backend.
     */
    public function search(string $search): Collection
{
    $search = trim($search);

    if ($search === '') {
        return collect();
    }

    return Trick::query()
        ->with('levels')
        ->where('name', 'like', "%{$search}%")
        ->orderByRaw('LOWER(name)')
        ->limit(5)
        ->get()
        ->map(function (Trick $behavior) {

            $levels = $behavior->levels
                ->pluck('name')
                ->map(fn ($name) => ucwords(str_replace('_', ' ', $name)))
                ->join(', ');

            return [
                'type' => 'Behavior',
                'title' => $behavior->name,
                'description' => $levels,
                'url' => route(
                    'admin-v2.behavior-catalog.show',
                    $behavior
                ),
            ];
        });
}
}