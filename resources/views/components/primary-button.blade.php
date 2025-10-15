@props(['type' => 'submit', 'color' => 'club'])

@php
// Define the color schemes (Only these should contain conflicting colors like bg/text)
$colorClasses = [
    // 1. Primary Button (Club Color)
    'club' => 'bg-club text-white hover:bg-club-hover active:bg-club focus:ring-indigo-500 border-transparent',
    
    // 2. Dark Button (White BG, Club Text, Transparent Hover)
    // Removed border-2 from here, and put it in $baseClasses so it applies to all buttons.
    // ADDED !important prefix to text-club to override the default text color if needed.
    'club-dark' => 'bg-white !text-club hover:bg-transparent hover:text-white hover:border-white focus:ring-indigo-500', 
];

// Select the class set
$currentColors = $colorClasses[$color] ?? $colorClasses['club'];

// --- REVISED BASE CLASSES ---
// Contains only structural and common styles (size, padding, font, common focus ring, etc.)
// Removed: !bg-club, border border-transparent, text-white, hover:bg-club-hover, active:bg-club, focus:bg-club-hover
$baseClasses = 'inline-flex items-center px-4 py-2 font-semibold text-xs uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150 border-2 border-transparent';

@endphp

<button
    {{ $attributes->merge([
        'type' => $type, 
        'class' => $baseClasses . ' ' . $currentColors
    ]) }}>
    {{ $slot }}
</button>