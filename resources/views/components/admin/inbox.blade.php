@props([
    'inquiries' => collect(),
    'archivedInquiries' => collect(),
])

<div
    x-data="{ tab: 'all' }"
    class="border-2 border-sp-warmStone bg-sp-limestone text-sp-charcoal rounded-sm my-4">

    {{-- Card Header / Tabs --}}
    <div class="border-b border-sp-warmStone">
        <nav class="flex gap-6 px-6">

            <button
                type="button"
                @click="tab = 'all'"
                :class="tab === 'all'
                    ? 'border-b-2 border-sp-prairieGreen text-sp-charcoal'
                    : 'text-sp-slate'"
                class="py-4 uppercase text-xs tracking-wide">

                All ({{ $inquiries->count() }})
            </button>

            <button
                type="button"
                @click="tab = 'archived'"
                :class="tab === 'archived'
                    ? 'border-b-2 border-sp-prairieGreen text-sp-charcoal'
                    : 'text-sp-slate'"
                class="py-4 uppercase text-xs tracking-wide">

                Archived ({{ $archivedInquiries->count() }})
            </button>

        </nav>
    </div>

    {{-- Card Content --}}
    <div class="p-6 text-sp-slate">

        {{-- Active Inquiries --}}
        <div x-show="tab === 'all'">

            @forelse ($inquiries as $inquiry)

                <a
                    href="{{ route('admin.inquiries.show', $inquiry) }}"
                    class="flex flex-col md:flex-row md:items-center justify-between gap-4 py-4 border-b border-sp-warmStone last:border-b-0 hover:bg-sp-warmStone/20 transition">

                    <div class="flex-1">

                        <div class="flex flex-wrap items-center gap-3 mb-2">

                            @if (!$inquiry->read_at)
                                <span class="w-2 h-2 rounded-full bg-sp-prairieGreen"
                                    title="Unread inquiry"></span>
                            @endif

                            <span class="text-xs uppercase tracking-wide text-sp-heritage">
                                {{ ucwords(str_replace('_', ' ', $inquiry->type)) }}
                            </span>

                            @if ($inquiry->resolved_at)
                                <span class="text-xs text-sp-slate">
                                    Resolved
                                </span>
                            @endif

                        </div>

                        <h3 class="font-semibold text-sp-charcoal">
                            {{ $inquiry->subject ?: 'Inquiry #' . $inquiry->id }}
                        </h3>

                        <p class="text-sm text-sp-slate mt-1">
                            {{ $inquiry->name }} &middot; {{ $inquiry->email }}
                        </p>

                    </div>

                    <div class="flex items-center gap-4">

                        <span class="text-xs text-sp-slate whitespace-nowrap">
                            {{ $inquiry->created_at->format('M j, Y') }}
                        </span>

                        <span class="text-sm text-sp-prairieGreen">
                            View &rarr;
                        </span>

                    </div>

                </a>

            @empty

                <div class="py-8 text-center">
                    <p class="text-sp-charcoal font-medium">
                        No inquiries yet.
                    </p>

                    <p class="text-sm text-sp-slate mt-2">
                        New submissions will appear here.
                    </p>
                </div>

            @endforelse

        </div>

        {{-- Archived Inquiries --}}
        <div x-show="tab === 'archived'" x-cloak>

            @forelse ($archivedInquiries as $inquiry)

                <a
                    href="{{ route('admin.inquiries.show', $inquiry) }}"
                    class="flex flex-col md:flex-row md:items-center justify-between gap-4 py-4 border-b border-sp-warmStone last:border-b-0 hover:bg-sp-warmStone/20 transition">

                    <div class="flex-1">

                        <span class="text-xs uppercase tracking-wide text-sp-heritage">
                            {{ ucwords(str_replace('_', ' ', $inquiry->type)) }}
                        </span>

                        <h3 class="font-semibold text-sp-charcoal mt-2">
                            {{ $inquiry->subject ?: 'Inquiry #' . $inquiry->id }}
                        </h3>

                        <p class="text-sm text-sp-slate mt-1">
                            {{ $inquiry->name }} &middot; {{ $inquiry->email }}
                        </p>

                    </div>

                    <div class="flex items-center gap-4">

                        <span class="text-xs text-sp-slate whitespace-nowrap">
                            {{ $inquiry->archived_at->format('M j, Y') }}
                        </span>

                        <span class="text-sm text-sp-prairieGreen">
                            View &rarr;
                        </span>

                    </div>

                </a>

            @empty

                <div class="py-8 text-center">
                    <p class="text-sp-charcoal font-medium">
                        No archived inquiries.
                    </p>

                    <p class="text-sm text-sp-slate mt-2">
                        Archived submissions will appear here.
                    </p>
                </div>

            @endforelse

        </div>

    </div>
</div>