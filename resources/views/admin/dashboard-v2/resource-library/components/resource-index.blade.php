<div
    id="resource-index"
    class="space-y-1"
>
    @forelse($resources as $resource)

        <button
            type="button"
            data-resource-index-item
            data-resource-id="{{ $resource->id }}"
            aria-pressed="false"
            class="group block w-full border-l-4 border-transparent
                   px-4 py-4 text-left transition-colors
                   hover:border-sp-warmStone hover:bg-sp-limestone/40"
        >
            {{-- Title --}}
            <h2
                class="font-sans text-base font-semibold leading-snug
                       text-sp-charcoal"
            >
                {{ $resource->title }}
            </h2>

            {{-- Type · Category · Archived state --}}
            <p class="mt-1 text-sm text-sp-slate">
                {{ $resource->type->name }}
                <span aria-hidden="true">·</span>
                {{ $resource->category->name }}

                @if($resource->status === 'archived')
                    <span aria-hidden="true">·</span>

                    <span class="text-sp-warningOchre">
                        Archived
                    </span>
                @endif
            </p>

            {{-- First Sent --}}
            <p class="mt-1 text-xs text-sp-slate">
                @if($resource->first_sent)
                    {{ $resource->first_sent->format('M j, Y') }}
                @else
                    Never Sent
                @endif
            </p>
        </button>

    @empty

        <div
            class="px-4 py-8 text-center"
        >
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