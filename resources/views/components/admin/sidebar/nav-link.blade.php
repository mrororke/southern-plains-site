@props([
    'route',
    'activeRoute',
    'icon' => null,
    'label',
    'showIcon' => true,
    'child' => false,
])

<a href="{{ route($route) }}"
    @class([
        'group flex items-center py-3',
        'gap-4 px-6' => $showIcon && $icon,
        'pl-20 pr-6' => !($showIcon && $icon) && $child,
        'px-6' => !($showIcon && $icon) && !$child,
    ])>

    @if($showIcon && $icon)
        <x-dynamic-component
            :component="'icons.' . $icon"
            @class([
                'transition-colors',
                'text-sp-controlledLime' => request()->routeIs($activeRoute),
                'text-sp-softWhite group-hover:text-sp-controlledLime' => !request()->routeIs($activeRoute),
            ]) />
    @endif

    <span
        @class([
            'uppercase text-xs tracking-wide whitespace-nowrap transition-colors',
            'text-sp-controlledLime' => request()->routeIs($activeRoute),
            'text-sp-softWhite group-hover:text-sp-controlledLime' => !request()->routeIs($activeRoute),
        ])>
        {{ $label }}
    </span>

</a>
