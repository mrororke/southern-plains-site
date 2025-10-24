@props(['id', 'heading', 'subheading', 'paragraph', 'buttonText', 'buttonColor', 'bgColor', 'bgMask'])

<div id="{{ $id }}" class="p-6 {{ $bgColor }} bg-cover bg-center"
    style="background-image: url('{{ asset('images/' . $bgMask) }}');">
    <div class="lg:px-[120px] p-4">

        {{-- Subheading (Club/League/Training) --}}
        <h4 class="uppercase text-xs font-bold">Southern Plains {{ $subheading }}</h4>

        {{-- Main Heading --}}
        <h3 class="font-heading text-5xl mb-6">{!! $heading !!}</h3>

        {{-- Paragraph Content --}}
        <p class="text-base mb-2">{!! $paragraph !!}</p>

        {{-- Call to Action Button --}}
        <x-primary-button color="{{ $buttonColor }}" class="mt-6">
            {{ __($buttonText) }}
        </x-primary-button>
    </div>
</div>