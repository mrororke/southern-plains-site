@props([
    'route' => null,
    'activeRoute' => null,
    'icon' => null,
    'label',
    'showIcon' => true,
    'child' => false,
    'status' => 'active',
])

@php
    $isDisabled = $status !== 'active' || !$route;
    $isActive = !$isDisabled && $activeRoute && request()->routeIs($activeRoute);
    $hasVisibleIcon = !$child && $showIcon && $icon;
@endphp

<a
    @if(!$isDisabled)
        href="{{ route($route) }}"
    @endif

    @if($isDisabled)
        aria-disabled="true"
    @endif

    @class([
        'group flex items-center py-3 transition-opacity',
        'gap-4 px-6' => $hasVisibleIcon,
        'pl-16 pr-6' => $child,
        'px-6' => !$hasVisibleIcon && !$child,
        'cursor-not-allowed opacity-40' => $isDisabled,
    ])>

    @if($hasVisibleIcon)
        <x-dynamic-component
            :component="'icons.' . $icon"
            @class([
                'transition-colors',
                'text-sp-controlledLime' => $isActive,
                'text-sp-warmIvory group-hover:text-sp-prairieOchre' => !$isActive && !$isDisabled,
                'text-sp-warmIvory' => $isDisabled,
            ]) />
    @endif

    <span
        @class([
            'uppercase text-xs tracking-wide whitespace-nowrap transition-colors',
            'text-sp-controlledLime' => $isActive,
            'text-sp-warmIvory group-hover:text-sp-prairieOchre' => !$isActive && !$isDisabled,
            'text-sp-warmIvory' => $isDisabled,
        ])>
        {{ $label }}
    </span>


</a>
