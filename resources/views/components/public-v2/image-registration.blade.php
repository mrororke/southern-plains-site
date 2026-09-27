@props([
    'text',
    'position' => 'right',
])

@php
    $positionClass = match ($position) {
        'left' => 'image-registration-left',
        'bottom' => 'image-registration-bottom',
        default => 'image-registration-right',
    };

    $textClass = match ($position) {
        'left' => 'image-registration-text-left',
        'bottom' => 'image-registration-text-bottom',
        default => 'image-registration-text-right',
    };
@endphp

<div class="image-registration {{ $positionClass }}">

    <x-icons.locate-fixed class="image-registration-mark" />

    <span class="image-registration-line"></span>

    <span class="{{ $textClass }}">
        {{ $text }}
    </span>

</div>