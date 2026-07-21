@props([
    'route',
    'activeRoute',
    'icon',
    'label',
])

<a href="{{ route($route) }}"
        class="group flex items-center gap-4 pt-12 px-6">

        <x-dynamic-component
            :component="'icons.' . $icon"
            @class([
                'transition-colors',
                'text-sp-controlledLime' => request()->routeIs($activeRoute),
                'text-sp-softWhite group-hover:text-sp-controlledLime' => !request()->routeIs($activeRoute),
            ]) />

        <span
            x-show="sidebarOpen"
            x-transition.delay.150ms
            @class([
            'uppercase text-xs tracking-wide whitespace-nowrap transition-colors',
            'text-sp-controlledLime' => request()->routeIs($activeRoute),
            'text-sp-softWhite group-hover:text-sp-controlledLime' => !request()->routeIs($activeRoute),
        ])>
            {{ $label }}
        </span>

    </a>