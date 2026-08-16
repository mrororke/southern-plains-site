<div
    id="resource-index"
    class="space-y-1"
>
    @forelse($resources as $resource)

        @include(
            'admin.dashboard-v2.resource-library.partials.catalog-card',
            [
                'resource' => $resource,
                'mode' => 'desktop',
            ]
        )

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