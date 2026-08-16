<div
    id="resource-index"
    class="space-y-1"
>
    @forelse($resources as $resource)

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
                            'is_current' => $version->id === $resource->id,
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


            {{-- Delivery: Session / Year / Week --}}
            @if(
                $resource->session
                || $resource->year
                || $resource->week_number
            )
                <p
                    class="mt-1 text-xs font-semibold
                           text-sp-charcoal"
                >
                    @if($resource->session)
                        {{ ucfirst($resource->session) }}
                    @endif

                    @if($resource->year)
                        @if($resource->session)
                            {{ ' ' }}
                        @endif

                        {{ $resource->year }}
                    @endif

                    @if(
                        $resource->week_number
                        && (
                            $resource->session
                            || $resource->year
                        )
                    )
                        <span aria-hidden="true">
                            ·
                        </span>
                    @endif

                    @if($resource->week_number)
                        Week {{ $resource->week_number }}
                    @endif
                </p>
            @endif


            {{-- Series --}}
            @if($resource->series)
                <p class="mt-1 text-xs text-sp-slate">
                    {{ $resource->series->name }}
                </p>
            @endif


            {{-- Type · Status --}}
            <p class="mt-2 text-xs text-sp-slate">

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

    @empty

        <div class="px-4 py-8 text-center">

            <p class="font-medium text-sp-charcoal">
                No resources found.
            </p>

            <p class="mt-1 text-sm text-sp-slate">
                Try changing your search or filters.
            </p>

        </div>

    @endforelse


    {{-- Pagination --}}
    @if($resources->hasPages())
        <div class="border-t border-sp-warmStone px-4 pt-4">
            {{ $resources->links() }}
        </div>
    @endif

</div>