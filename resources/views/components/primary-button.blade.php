@props(['type' => 'submit', 'color' => 'club', 'activeClass' => ''])

@php
// Define the color schemes (Using the color prop 'train')
$colorClasses = [
    'club' => 'bg-club text-white hover:bg-club-hover active:bg-club border-transparent focus:ring-club',
    'club-dark' => 'bg-white !text-club hover:bg-transparent hover:text-white hover:border-white focus:ring-club', 
    'league' => 'bg-league text-white hover:bg-league-hover active:bg-league border-transparent focus:ring-league',
    'league-dark' => 'bg-white !text-league hover:bg-transparent hover:text-white hover:border-white focus:ring-league', 
    'train' => 'bg-training text-white hover:bg-training-hover active:bg-training border-transparent focus:ring-training',
    'train-dark' => 'bg-white !text-training hover:bg-transparent hover:text-white hover:border-white focus:ring-training', 
];

// Select the class set based on the 'color' prop
$currentColors = $colorClasses[$color] ?? $colorClasses['club'];

// --- BASE CLASSES ---
// Added focus:ring-[color] to base classes for accessibility consistency
$baseClasses = 'inline-flex items-center px-4 py-2 font-semibold text-xs uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150 border-2 border-transparent';

// Concatenate base, color scheme, and any custom active classes
// Note: We intentionally put $activeClass last so it can overwrite the background/hover defined in $currentColors
$finalClasses = $baseClasses . ' ' . $currentColors . ' ' . $activeClass;

@endphp

<button
    {{ $attributes->merge([
        'type' => $type, 
        'class' => $finalClasses // Merges with any custom classes passed in the call
    ]) }}>
    {{ $slot }}
</button>