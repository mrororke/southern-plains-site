@props([
    'text',
    'position' => 'right',
])

<div class="image-registration image-registration-{{ $position }}">

    <x-icons.locate-fixed class="image-registration-mark" />

    <span class="image-registration-line"></span>

    <span class="image-registration-text-{{ $position }}">
        {{ $text }}
    </span>

</div>