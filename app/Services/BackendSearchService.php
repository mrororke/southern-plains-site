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

        $behaviors = collect();
        $behaviorCount = 0;

        if ($search !== '') {
            $behaviorQuery = Trick::query()
                ->where('name', 'like', "%{$search}%");

            $behaviorCount = (clone $behaviorQuery)->count();

            $behaviors = $behaviorQuery
                ->with('levels')
                ->orderByRaw('LOWER(name)')
                ->limit(5)
                ->get()
                ->map(function (Trick $behavior) {
                    $levels = $behavior->levels
                        ->pluck('name')
                        ->map(
                            fn($name) => ucwords(
                                str_replace('_', ' ', $name)
                            )
                        )
                        ->join(', ');

                    return [
                        'type' => 'Behavior',
                        'title' => $behavior->name,
                        'description' => $levels,
                        'url' => route(
                            'admin-v2.behavior-catalog.index',
                            [
                                'search' => $behavior->name,
                                'behavior' => $behavior->id,
                            ]
                        ),
                    ];
                });
        }

        return collect([
            'behaviors' => [
                'label' => 'Behaviors',
                'count' => $behaviorCount,
                'items' => $behaviors,
                'viewAllUrl' => route(
                    'admin-v2.behavior-catalog.index',
                    ['search' => $search]
                ),
            ],

            'resources' => [
                'label' => 'Resources',
                'count' => 0,
                'items' => collect(),
                'viewAllUrl' => null,
            ],

            'dogs' => [
                'label' => 'Dogs',
                'count' => 0,
                'items' => collect(),
                'viewAllUrl' => null,
            ],

            'events' => [
                'label' => 'Events',
                'count' => 0,
                'items' => collect(),
                'viewAllUrl' => null,
            ],

            'users' => [
                'label' => 'Users',
                'count' => 0,
                'items' => collect(),
                'viewAllUrl' => null,
            ],
        ]);
    }
}
