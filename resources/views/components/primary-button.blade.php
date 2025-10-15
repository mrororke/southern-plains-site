@props(['type' => 'submit', 'color' => 'club'])

@php
// Define the color schemes (Only these should contain conflicting colors like bg/text)
$colorClasses = [
    'club' => 'bg-club text-white hover:bg-club-hover active:bg-club border-transparent',
    'club-dark' => 'bg-white !text-club hover:bg-transparent hover:text-white hover:border-white', 
    'league' => 'bg-league text-white hover:bg-league-hover active:bg-league border-transparent',
    'league-dark' => 'bg-white !text-league hover:bg-transparent hover:text-white hover:border-white', 
    'train' => 'bg-training text-white hover:bg-training-hover active:bg-training border-transparent',
    'train-dark' => 'bg-white !text-training hover:bg-transparent hover:text-white hover:border-white', 
];

// Select the class set
$currentColors = $colorClasses[$color] ?? $colorClasses['club'];

// --- BASE CLASSES ---
$baseClasses = 'inline-flex items-center px-4 py-2 font-semibold text-xs uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150 border-2 border-transparent';

@endphp

<button
    {{ $attributes->merge([
        'type' => $type, 
        'class' => $baseClasses . ' ' . $currentColors
    ]) }}>
    {{ $slot }}
</button>