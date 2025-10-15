<button {{ $attributes->merge([
    'type' => 'submit', 
    'class' => 'inline-flex items-center px-4 py-2 !bg-club border border-transparent font-semibold text-xs text-white uppercase tracking-widest hover:bg-club-hover focus:bg-club-hover active:bg-club focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'
]) }}>
    {{ $slot }}
</button>


@props(['type' => 'submit', 'color' => 'indigo'])

@php
    // Define the base color classes based on the 'color' prop
    $colorClasses = [
        'club' => 'bg-club hover:bg-club-hover focus:bg-club-hover active:bg-club',
        'club-dark' => 'bg-white text-club hover:bg-club hover:text-white focus:bg-white active:bg-white',
        'red'    => 'bg-red-600 hover:bg-red-500 active:bg-red-700 focus:ring-red-500',
        'club'   => '!bg-club hover:bg-club-hover active:bg-club focus:ring-indigo-500', // Uses your custom classes
        // Add more colors here as needed
    ];

    // Select the class set, falling back to indigo if the color isn't defined
    $currentColors = $colorClasses[$color] ?? $colorClasses['indigo'];

    // Define the common button styles
    $baseClasses = 'inline-flex items-center px-4 py-2 border border-transparent font-semibold text-xs text-white uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150';

@endphp

<button 
    {{ $attributes->merge([
        'type' => $type, 
        'class' => $baseClasses . ' ' . $currentColors
    ]) }}
>
    {{ $slot }}
</button>