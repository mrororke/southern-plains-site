@props(['type' => 'submit', 'color' => 'club', 'activeClass' => ''])

@php
// Define the color schemes (Using the color prop 'train')
$colorClasses = [
    'club' => 'bg-club text-white hover:bg-club-hover active:bg-club border-transparent focus:ring-club',
    
    // FIX: Changed hover:text-white to !hover:text-white for dark themes to override !text-[color]
    'club-dark' => 'bg-white text-club hover:bg-transparent !hover:text-white hover:border-white focus:ring-club', 
    
    'league' => 'bg-league text-white hover:bg-league-hover active:bg-league border-transparent focus:ring-league',
    
    // FIX: Changed hover:text-white to !hover:text-white
    'league-dark' => 'bg-white text-league hover:bg-transparent !hover:text-white hover:border-white focus:ring-league', 
    
    'train' => 'bg-training text-white hover:bg-training-hover active:bg-training border-transparent focus:ring-training',
    
    // FIX: Changed hover:text-white to !hover:text-white
    'train-dark' => 'bg-white text-training hover:bg-transparent !hover:text-white hover:border-white focus:ring-training', 
];

// Select the class set based on the 'color' prop
$currentColors = $colorClasses[$color] ?? $colorClasses['club'];

// --- BASE CLASSES ---
$baseClasses = 'inline-flex items-center px-4 py-2 font-semibold text-xs uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150 border-2 border-transparent';

// Concatenate base, color scheme, and any custom active classes
$finalClasses = $baseClasses . ' ' . $currentColors . ' ' . $activeClass;

@endphp

<button
    {{ $attributes->merge([
        'type' => $type, 
        'class' => $finalClasses 
    ]) }}>
    {{ $slot }}
</button>