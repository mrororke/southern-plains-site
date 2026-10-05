@props([
    'category',
    'readTime',
    'updated',
])

{{-- Article Metadata --}}
<ul class="flex flex-wrap items-center gap-x-8 gap-y-3 mt-6 text-sp-slate">

    <li class="flex items-center gap-2">

        <x-icons.folder
            class="w-5 h-5 shrink-0"
            aria-hidden="true" />

        <span class="body-small">
            {{ $category }}
        </span>

    </li>

    <li class="flex items-center gap-2">

        <x-icons.clock
            class="w-5 h-5 shrink-0"
            aria-hidden="true" />

        <span class="body-small">
            {{ $readTime }}
        </span>

    </li>

    <li class="flex items-center gap-2">

        <x-icons.calendar-days
            class="w-5 h-5 shrink-0"
            aria-hidden="true" />

        <span class="body-small">
            {{ $updated }}
        </span>

    </li>

</ul>
{{-- End Article Metadata --}}