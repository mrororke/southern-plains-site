<?php

namespace App\Services;

use Illuminate\Support\Collection;

class BackendSearchService
{
    /**
     * Search the backend.
     */
    public function search(string $search): Collection
    {
        $results = collect();

        return $results;
    }
}