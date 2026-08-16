@props([
    'resource',
    'mode' => 'desktop',
])

@php
    $deliveryParts = [];

    $sessionYear = trim(
        collect([
            $resource->session
                ? ucfirst($resource->session)
                : null,
            $resource->year,
        ])
            ->filter()
            ->join(' ')
    );

    if ($sessionYear !== '') {
        $deliveryParts[] = $sessionYear;
    }

    if ($resource->series) {
        $deliveryParts[] = $resource->series->name;
    }

    if ($resource->week_number) {
        $deliveryParts[] = 'Week ' . $resource->week_number;
    }

    $deliveryLabel = implode(' · ', $deliveryParts);
@endphp


@if($mode === 'mobile')

    <a
        href="{{ route('admin-v2.resource-library.show', $resource) }}"
        class="group flex items-center justify-between gap-4
               px-4 py-4 transition-colors
               hover:bg-sp-limestone/20"
    >
        <div class="min-w-0">

            {{-- Title --}}
            <h2
                class="font-sans text-sm font-semibold
                       leading-snug text-sp-charcoal"
            >
                {{ $resource->title }}
            </h2>


            {{-- Session / Year · Series · Week --}}
            @if($deliveryLabel !== '')
                <p
                    class="mt-1 text-xs font-semibold
                           text-sp-charcoal"
                >
                    {{ $deliveryLabel }}
                </p>
            @endif


            {{-- Type --}}
            <p class="mt-1 text-xs text-sp-slate">
                {{ $resource->type->name }}
            </p>


            {{-- First Sent --}}
            <p class="mt-1 text-xs text-sp-slate">
                @if($resource->first_sent)
                    Sent {{ $resource->first_sent->format('M j, Y') }}
                @else
                    Never Sent
                @endif
            </p>

        </div>

        <x-icons.chevron-right
            class="h-4 w-4 shrink-0 text-sp-slate
                   transition-transform
                   group-hover:translate-x-1"
        />
    </a>

@else

    <button
        type="button"
        data-resource-id="{{ $resource->id }}"
        @click="selectResource({
            id: {{ $resource->id }},
            title: @js($resource->title),
            body: @js($resource->body),
            type: @js($resource->type->name),
            category: @js($resource->category->name),
            status: @js($resource->status),

            series: @js(
                $resource->series?->name ?? 'No Series'
            ),

            year: @js($resource->year),
            session: @js($resource->session),
            week_number: @js($resource->week_number),

            created_at: @js(
                $resource->created_at->format('M j, Y')
            ),

            updated_at: @js(
                $resource->updated_at->format('M j, Y')
            ),

            first_sent: @js(
                $resource->first_sent
                    ? $resource->first_sent->format('M j, Y')
                    : 'Never Sent'
            ),

            tricks: @js(
                $resource->tricks->map(fn ($trick) => [
                    'id' => $trick->id,
                    'name' => $trick->name,
                    'url' => route(
                        'admin-v2.behavior-catalog.index',
                        [
                            'behavior' => $trick->id,
                        ]
                    ),
                ])
            ),

            related_resources: @js(
                $resource->relatedResources
                    ->merge($resource->inverseRelatedResources)
                    ->unique('id')
                    ->map(fn ($related) => [
                        'id' => $related->id,
                        'title' => $related->title,
                    ])
                    ->values()
            ),

            series_resources: @js(
                $resource->series
                    ? $resource->series
                        ->resources()
                        ->orderByDesc('created_at')
                        ->get()
                        ->map(fn ($seriesResource) => [
                            'id' => $seriesResource->id,
                            'title' => $seriesResource->title,
                        ])
                        ->values()
                    : []
            ),

            version_history: @js(
                $resource->versionHistory()
                    ->map(fn ($version) => [
                        'id' => $version->id,
                        'title' => $version->title,
                        'year' => $version->year,
                        'session' => $version->session,
                        'week_number' => $version->week_number,
                        'is_current' =>
                            $version->id === $resource->id,
                    ])
                    ->values()
            ),

            edit_url: @js(
                route(
                    'admin-v2.resource-library.edit',
                    $resource
                )
            )
        })"
        :aria-pressed="
            selectedResource?.id === {{ $resource->id }}
                ? 'true'
                : 'false'
        "
        :class="{
            'border-sp-burntClay bg-sp-limestone/20':
                selectedResource?.id === {{ $resource->id }},
            'border-transparent':
                selectedResource?.id !== {{ $resource->id }}
        }"
        class="group block w-full border-l-[8px]
               px-4 py-4 text-left
               transition-all duration-150 ease-out
               hover:bg-sp-limestone/20
               focus:outline-none
               focus-visible:ring-2
               focus-visible:ring-sp-prairieBlue
               focus-visible:ring-offset-2"
    >

        {{-- Title --}}
        <h2
            class="font-sans text-sm leading-snug text-sp-charcoal"
            :class="{
                'font-bold':
                    selectedResource?.id === {{ $resource->id }},
                'font-semibold':
                    selectedResource?.id !== {{ $resource->id }}
            }"
        >
            {{ $resource->title }}
        </h2>


        {{-- Session / Year · Series · Week --}}
        @if($deliveryLabel !== '')
            <p
                class="mt-1 text-xs font-semibold
                       text-sp-charcoal"
            >
                {{ $deliveryLabel }}
            </p>
        @endif


        {{-- Type · Status --}}
        <p class="mt-1 text-xs text-sp-slate">

            {{ $resource->type->name }}

            <span aria-hidden="true">
                ·
            </span>

            @if($resource->status === 'archived')
                <span class="text-sp-warningOchre">
                    Archived
                </span>
            @else
                <span class="text-sp-successGreen">
                    Active
                </span>
            @endif

        </p>


        {{-- First Sent --}}
        <p class="mt-1 text-xs text-sp-slate">

            @if($resource->first_sent)
                Sent {{ $resource->first_sent->format('M j, Y') }}
            @else
                Never Sent
            @endif

        </p>

    </button>

@endif