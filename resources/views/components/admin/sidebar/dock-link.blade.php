@props([
    'route',
    'activeRoute',
    'icon',
])

<a href="{{ route($route) }}"
    class="group flex justify-center pt-12">

    <x-dynamic-component
        :component="'icons.'. $icon"
            @class([
            'transition-colors',
            'text-sp-controlledLime'=> request()->routeIs($activeRoute),
            'text-sp-softWhite group-hover:text-sp-controlledLime' => !request()->routeIs($activeRoute),
    ]) />

</a>