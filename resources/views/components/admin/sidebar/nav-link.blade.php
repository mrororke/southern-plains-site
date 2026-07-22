@props([
    'route',
    'activeRoute',
    'icon',
    'label',
])

<a href="{{ route($route) }}"
    class="group flex items-center gap-4 px-6 py-3">

    <x-dynamic-component
        :component="'icons.' . $icon"
        @class([
            'transition-colors',
            'text-sp-controlledLime' => request()->routeIs($activeRoute),
            'text-sp-softWhite group-hover:text-sp-controlledLime' => !request()->routeIs($activeRoute),
        ]) />

    <span
        @class([
            'uppercase text-xs tracking-wide whitespace-nowrap transition-colors',
            'text-sp-controlledLime' => request()->routeIs($activeRoute),
            'text-sp-softWhite group-hover:text-sp-controlledLime' => !request()->routeIs($activeRoute),
        ])>
        {{ $label }}
    </span>

</a>