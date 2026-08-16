<?php

namespace App\Services;

use App\Models\ResourceLibrary\Resource;
use App\Models\Trick;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class BackendSearchService
{
    /**
     * Search the backend.
     */
    public function search(string $search): Collection
    {
        $search = trim($search);

        /*
        |--------------------------------------------------------------------------
        | Behaviors
        |--------------------------------------------------------------------------
        */

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
                            fn ($name) => ucwords(
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


        /*
        |--------------------------------------------------------------------------
        | Resources
        |--------------------------------------------------------------------------
        */

        $resources = collect();
        $resourceCount = 0;

        if ($search !== '') {
            $resourceQuery = Resource::query()
                ->where('status', 'active')
                ->where(function (Builder $query) use ($search) {
                    $query
                        ->where(
                            'title',
                            'like',
                            "%{$search}%"
                        )
                        ->orWhere(
                            'body',
                            'like',
                            "%{$search}%"
                        )
                        ->orWhereHas(
                            'category',
                            fn (Builder $categoryQuery) =>
                                $categoryQuery->where(
                                    'name',
                                    'like',
                                    "%{$search}%"
                                )
                        )
                        ->orWhereHas(
                            'type',
                            fn (Builder $typeQuery) =>
                                $typeQuery->where(
                                    'name',
                                    'like',
                                    "%{$search}%"
                                )
                        )
                        ->orWhereHas(
                            'series',
                            fn (Builder $seriesQuery) =>
                                $seriesQuery->where(
                                    'name',
                                    'like',
                                    "%{$search}%"
                                )
                        )
                        ->orWhereHas(
                            'tricks',
                            fn (Builder $trickQuery) =>
                                $trickQuery->where(
                                    'name',
                                    'like',
                                    "%{$search}%"
                                )
                        );
                });

            $resourceCount = (clone $resourceQuery)->count();

            $resources = $resourceQuery
                ->with([
                    'category',
                    'type',
                    'series',
                ])
                ->orderByRaw(
                    'CASE
                        WHEN first_sent IS NULL THEN 1
                        ELSE 0
                    END'
                )
                ->orderByDesc('first_sent')
                ->orderByDesc('created_at')
                ->limit(5)
                ->get()
                ->map(function (Resource $resource) {

                    /*
                    |--------------------------------------------------------------------------
                    | Resource Description
                    |--------------------------------------------------------------------------
                    */

                    $descriptionParts = [];

                    $sessionYear = trim(
                        collect([
                            $resource->session
                                ? ucfirst($resource->session)
                                : null,
                            $resource->year,
                        ])
                            ->filter()
                            ->join(' ')
                    );

                    if ($sessionYear !== '') {
                        $descriptionParts[] = $sessionYear;
                    }

                    if ($resource->series) {
                        $descriptionParts[] =
                            $resource->series->name;
                    }

                    if ($resource->week_number) {
                        $descriptionParts[] =
                            'Week ' . $resource->week_number;
                    }

                    if ($resource->type) {
                        $descriptionParts[] =
                            $resource->type->name;
                    }

                    return [
                        'type' => 'Resource',
                        'title' => $resource->title,
                        'description' => implode(
                            ' · ',
                            $descriptionParts
                        ),
                        'url' => route(
                            'admin-v2.resource-library.show',
                            $resource
                        ),
                    ];
                });
        }


        /*
        |--------------------------------------------------------------------------
        | Search Results
        |--------------------------------------------------------------------------
        */

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
                'count' => $resourceCount,
                'items' => $resources,
                'viewAllUrl' => route(
                    'admin-v2.resource-library.index',
                    ['search' => $search]
                ),
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