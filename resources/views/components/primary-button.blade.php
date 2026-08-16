@props([
    'type' => 'submit',
    'color' => 'club',
    'activeClass' => '',
])

@php

$colorClasses = [

    /*
    |--------------------------------------------------------------------------
    | Legacy Public Site
    |--------------------------------------------------------------------------
    */

    'club' =>
        'bg-club text-white hover:bg-club-hover active:bg-club border-transparent focus:ring-club',

    'club-dark' =>
        'bg-white text-club hover:bg-transparent !hover:text-white hover:border-white focus:ring-club',

    'league' =>
        'bg-league text-white hover:bg-league-hover active:bg-league border-transparent focus:ring-league',

    'league-dark' =>
        'bg-white text-league hover:bg-transparent !hover:text-white hover:border-white focus:ring-league',

    'train' =>
        'bg-training text-white hover:bg-training-hover active:bg-training border-transparent focus:ring-training',

    'train-dark' =>
        'bg-white text-training hover:bg-transparent !hover:text-white hover:border-white focus:ring-training',


    /*
    |--------------------------------------------------------------------------
    | Dashboard V2 / New Brand
    |--------------------------------------------------------------------------
    */

    'primary' =>
        'bg-sp-prairieGreen text-sp-warmIvory hover:bg-sp-prairieOchre active:bg-sp-prairieGreen border-transparent focus:ring-sp-prairieGreen',

    'secondary' =>
        'border border-sp-warmStone bg-white text-sp-charcoal hover:bg-sp-limestone/20 focus:ring-sp-prairieGreen',

    'danger' =>
        'bg-sp-burntClay text-sp-warmIvory hover:brightness-95 border-transparent focus:ring-sp-burntClay',

    'warning' =>
        'bg-sp-warningOchre text-sp-charcoal hover:brightness-95 border-transparent focus:ring-sp-warningOchre',

    'ghost' =>
        'bg-transparent text-sp-prairieGreen hover:bg-sp-limestone/20 border-transparent focus:ring-sp-prairieGreen',

];

$currentColors = $colorClasses[$color] ?? $colorClasses['primary'];

$baseClasses =
    'inline-flex items-center justify-center rounded-md
     px-4 py-2
     text-sm font-semibold
     transition-colors duration-200
     focus:outline-none focus:ring-2 focus:ring-offset-2';

$finalClasses = trim(
    $baseClasses . ' ' . $currentColors . ' ' . $activeClass
);

@endphp

<button
    {{ $attributes->merge([
        'type' => $type,
        'class' => $finalClasses,
    ]) }}
>
    {{ $slot }}
</button>