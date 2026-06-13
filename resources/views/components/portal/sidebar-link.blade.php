@props([
    'label',
    'route',
    'active' => false,
    'nested' => false,
    'topLevel' => false,
])

@if($topLevel)

    <div
        class="border-t border-b border-white block text-white uppercase text-sm hover:bg-gray-700"
        style="padding: 10px 0 10px 26px; margin: 0 !important;"
    >
        <a
            href="{{ $route }}"
            @class([
                '',
                'bg-gray-700' => $active,
            ])
        >
            {{ $label }}
        </a>
    </div>

@else

    <li>
        <a
            href="{{ $route }}"
            @class([
                'block text-white hover:bg-gray-700 uppercase',
                'bg-gray-700' => $active,
                'text-sm border-b border-white',
            ])
            style="padding: {{ $nested ? '10px 0 10px 50px' : '10px 0 10px 10px' }};"
        >
            {{ $label }}
        </a>
    </li>

@endif