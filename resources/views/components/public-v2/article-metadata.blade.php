@props([
    'category',
    'readTime',
    'updated',
    'published' => null,
])

{{-- Article Metadata --}}
<ul class="flex flex-wrap items-start gap-x-8 gap-y-3 mt-6 text-sp-slate">

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

    @if ($updated || $published)
        <li class="flex items-start gap-2">

            <x-icons.calendar-days
                class="w-5 h-5 shrink-0"
                aria-hidden="true" />

            <div>
                @if ($updated)
                    <p class="body-small text-sp-slate">
                        {{ $updated }}
                    </p>
                @endif

                @if ($published && $published !== $updated)
                    <p class="text-xs text-sp-slate mt-1">
                        Originally published {{ $published }}
                    </p>
                @endif
            </div>

        </li>
    @endif

</ul>
{{-- End Article Metadata --}}