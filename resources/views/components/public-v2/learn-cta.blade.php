@props([
    'title',
    'text',
    'href',
])

{{-- Learn CTA --}}
<div class="mt-12 rounded-md bg-sp-prairieGreen p-6 md:p-8">

    <div class="flex items-start gap-4">

        <x-icons.calendar-plus
            class="mt-0.5 h-6 w-6 shrink-0 text-sp-warmIvory"
            aria-hidden="true" />

        <div>

            <h3 class="font-sans text-2xl font-semibold text-sp-warmIvory">
                {{ $title }}
            </h3>

            <p class="body text-sp-warmIvory mt-4">
                {{ $text }}
            </p>

            <a
                href="{{ $href }}"
                class="learn-more-link text-sp-warmIvory mt-5">
                {{ $slot }}
                <x-icons.move-right />
            </a>

        </div>

    </div>

</div>
{{-- End Learn CTA --}}