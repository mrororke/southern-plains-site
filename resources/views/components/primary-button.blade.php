@props(['type' => 'submit', 'color' => 'club'])

@php
// Define the base color classes based on the 'color' prop
$colorClasses = [
'club' => 'bg-club hover:bg-club-hover focus:bg-club-hover active:bg-club',
    'club-dark' => 'bg-white text-club border-2 border-transparent hover:bg-transparent hover:text-white hover:border-white focus:bg-white active:bg-white',
// Add more colors here as needed
];

// Select the class set, falling back to indigo if the color isn't defined
$currentColors = $colorClasses[$color] ?? $colorClasses['club'];

// Define the common button styles
$baseClasses = 'inline-flex items-center px-4 py-2 !bg-club border border-transparent font-semibold text-xs text-white uppercase tracking-widest hover:bg-club-hover focus:bg-club-hover active:bg-club focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150';

@endphp

<button
    {{ $attributes->merge([
        'type' => $type, 
        'class' => $baseClasses . ' ' . $currentColors
    ]) }}>
    {{ $slot }}
</button>