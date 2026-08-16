<?php

namespace App\Services\Rats;

use App\Models\Rat;

class RatQueryService
{
    public function index(array $filters)
    {
        $query = Rat::with(['breeder', 'colors']);

        if (!empty($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('name', 'like', "%{$filters['search']}%")
                  ->orWhere('registered_name', 'like', "%{$filters['search']}%");
            });
        }

        if (($filters['type'] ?? null) === 'pedigree') {
            $query->where('is_pedigree_only', true);
        }

        if (($filters['type'] ?? null) === 'full') {
            $query->where('is_pedigree_only', false);
        }

        if (!empty($filters['sex'])) {
            $query->where('sex', $filters['sex']);
        }

        if (!empty($filters['breeder_id'])) {
            $query->where('breeder_id', $filters['breeder_id']);
        }

        if (($filters['status'] ?? null) === 'living') {
            $query->whereNull('dod');
        }

        if (($filters['status'] ?? null) === 'deceased') {
            $query->whereNotNull('dod');
        }

        return $query->orderBy('name')
            ->paginate(50)
            ->withQueryString();
    }
}