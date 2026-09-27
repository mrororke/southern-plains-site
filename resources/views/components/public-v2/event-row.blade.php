@props([
    'month',
    'day',
    'title',
    'description' => null,
    'location',
])

{{-- Event Row --}}
<div class="flex items-start md:items-center border-b border-sp-limestone py-6">

    {{-- Date --}}
    <div class="w-20 md:w-28 shrink-0">

        <div class="font-sans text-xl font-semibold uppercase text-sp-charcoal">
            {{ $month }}
        </div>

        <div class="font-sans text-6xl text-sp-prairieOchre">
            {{ $day }}
        </div>

    </div>


    {{-- Event Details --}}
    <div class="flex-1 min-w-0">

        <h3 class="font-sans text-2xl font-semibold uppercase text-sp-charcoal">
            {{ $title }}
        </h3>

        @if ($description)
            <p class="mt-1 text-lg text-sp-slate">
                {{ $description }}
            </p>
        @endif

        {{-- Mobile Location --}}
        <div class="mt-3 flex items-center gap-2 text-sp-slate md:hidden">

            <x-icons.milestone class="w-5 h-5 shrink-0" />

            <span class="text-sm">
                {{ $location }}
            </span>

        </div>

    </div>


    {{-- Desktop Location --}}
    <div class="ml-auto hidden md:flex shrink-0 items-center justify-end gap-3 pl-6 text-sp-slate">

        <x-icons.milestone class="w-5 h-5 shrink-0" />

        <span class="text-sm whitespace-nowrap">
            {{ $location }}
        </span>

    </div>

</div>