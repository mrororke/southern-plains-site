@props([
    'text',
    'position' => 'right',
    'compact' => false,
    'href' => null,
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

    $compactClass = $compact
        ? 'image-registration-compact'
        : '';

    $registrationClass = "image-registration {$positionClass} {$compactClass}";
@endphp

@if ($href)

    <a
        href="{{ $href }}"
        target="_blank"
        rel="noopener noreferrer"
        class="{{ $registrationClass }}">

        <x-icons.locate-fixed class="image-registration-mark" />

        <span class="image-registration-line"></span>

        <span class="{{ $textClass }}">
            {{ $text }}
        </span>

    </a>

@else

    <div class="{{ $registrationClass }}">

        <x-icons.locate-fixed class="image-registration-mark" />

        <span class="image-registration-line"></span>

        <span class="{{ $textClass }}">
            {{ $text }}
        </span>

    </div>

@endif