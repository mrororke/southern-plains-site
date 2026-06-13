<?php

namespace App\Services\Rats;

use App\Models\Rat;

class RatStatsService
{
    public function get(): array
    {
        $totalRats = Rat::count();
        $ownedRats = Rat::where('is_owned', true)->count();
        $pedigreeRats = Rat::where('is_pedigree_only', true)->count();
        $livingRats = Rat::whereNull('dod')->count();
        $foundationRats = Rat::whereNull('sire_id')->whereNull('dam_id')->count();

        $totalWithParents = Rat::count();
        $completePedigree = Rat::whereNotNull('sire_id')
            ->whereNotNull('dam_id')
            ->count();

        $incompletePedigreePercent = $totalWithParents > 0
            ? round((($totalWithParents - $completePedigree) / $totalWithParents) * 100, 1)
            : 0;

        return compact(
            'totalRats',
            'ownedRats',
            'pedigreeRats',
            'livingRats',
            'foundationRats',
            'incompletePedigreePercent'
        );
    }
}