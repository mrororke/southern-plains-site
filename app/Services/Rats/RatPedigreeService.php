<?php

namespace App\Services\Rats;

use App\Models\Rat;

class RatPedigreeService
{
    public function maxDepth(): int
    {
        return Rat::with(['sire', 'dam'])
            ->get()
            ->map(fn ($rat) => $rat->pedigreeDepth())
            ->max() ?? 0;
    }
}