@props([
    'route' => null,
    'activeRoute' => null,
    'icon',
    'status' => 'active',
])

@php
    /*
    |--------------------------------------------------------------------------
    | State
    |--------------------------------------------------------------------------
    |
    | activeRoute may be either:
    | - a single route pattern
    | - an array of route patterns from a navigation group's children
    |
    */

    $isDisabled = $status !== 'active';

    $activeRoutes = collect(
        is_array($activeRoute)
            ? $activeRoute
            : [$activeRoute]
    )
        ->filter()
        ->values()
        ->all();

    $isActive =
        ! $isDisabled
        && ! empty($activeRoutes)
        && request()->routeIs(...$activeRoutes);
@endphp

<a
    @if(! $isDisabled && $route)
        href="{{ route($route) }}"
    @endif

    @if($isDisabled)
        aria-disabled="true"
    @endif

    @class([
        'group flex h-12 items-center justify-center transition-opacity',
        'cursor-not-allowed opacity-40' => $isDisabled,
    ])
>
    <x-dynamic-component
        :component="'icons.' . $icon"
        @class([
            'transition-colors',
            'text-sp-prairieGreen' => $isActive,
            'text-sp-warmIvory group-hover:text-sp-prairieGreen' =>
                ! $isActive && ! $isDisabled,
            'text-sp-limestone' => $isDisabled,
        ])
    />
</a>