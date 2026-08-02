@props([
    'route' => null,
    'activeRoute' => null,
    'icon',
    'status' => 'active',
])

@php
    $isDisabled = $status !== 'active' || !$route;
    $isActive = !$isDisabled && $activeRoute && request()->routeIs($activeRoute);
@endphp

<a
    @if(!$isDisabled)
        href="{{ route($route) }}"
    @endif

    @if($isDisabled)
        aria-disabled="true"
    @endif

    @class([
        'group flex h-12 items-center justify-center transition-opacity',
        'cursor-not-allowed opacity-40' => $isDisabled,
    ])>

    <x-dynamic-component
        :component="'icons.' . $icon"
        @class([
            'transition-colors',
            'text-sp-prairieGreen' => $isActive,
            'text-sp-warmIvory group-hover:text-sp-prairieGreen' => !$isActive && !$isDisabled,
            'text-sp-limestone' => $isDisabled,
        ]) />

</a>
