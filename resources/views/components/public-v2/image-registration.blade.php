@props([
    'text',
    'position' => 'right',
])

@php
    $positionClass = $position === 'bottom'
        ? 'image-registration-bottom'
        : 'image-registration-right';

    $textClass = $position === 'bottom'
        ? 'image-registration-text-bottom'
        : 'image-registration-text-right';
@endphp

<div class="image-registration {{ $positionClass }}">

    <x-icons.locate-fixed class="image-registration-mark" />

    <span class="image-registration-line"></span>

    <span class="{{ $textClass }}">
        {{ $text }}
    </span>

</div>