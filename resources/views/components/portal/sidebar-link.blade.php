@props([
'label',
'route',
'active' => false,
'nested' => false,
'topLevel' => false.
])

<li>

    <a
        href="{{ $route }}"
        @class([ 'block text-white hover:bg-gray-700 uppercase' , 'bg-gray-700'=> $active,
        'text-sm border-b border-white',
        ])
        style="
        padding:
        {{ $nested
            ? '10px 0 10px 50px'
            : ($topLevel
        ? '10px 0 10px 26px'
        : '10px 0 10px 10px')
}};
        "
        >
        {{ $label }}
    </a>

</li>