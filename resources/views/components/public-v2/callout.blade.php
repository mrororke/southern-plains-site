@props([
    'icon',
    'title',
])

{{-- Callout --}}
<div class="mt-8 rounded-md border border-sp-warmStone bg-sp-limestone p-5 md:p-6">

    <div class="flex items-start gap-4">

        <x-dynamic-component
            :component="'icons.' . $icon"
            class="mt-0.5 h-6 w-6 shrink-0 text-sp-prairieOchre"
            aria-hidden="true" />

        <div>

            <h3 class="font-sans text-xl font-semibold text-sp-charcoal">
                {{ $title }}
            </h3>

            <div class="body text-sp-slate mt-4">
                {{ $slot }}
            </div>

        </div>

    </div>

</div>
{{-- End Callout --}}