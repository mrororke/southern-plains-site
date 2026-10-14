@extends('admin.dashboard-v2.desktop')

@section('title', 'Learn')

@section('content')

<div class="dashboard-content">

    {{-- Header Image --}}
    <div class="py-4">
        <img
            src="{{ asset('images/headers/header-learn.jpg') }}"
            alt="Hamish, a shetland sheepdog, in a field of wildflowers."
            class="rounded-md">
    </div>


    {{-- Page Header --}}
    <div class="flex flex-wrap items-center justify-between gap-4">

        <h1 class="font-sans text-sp-charcoal font-semibold text-6xl">
            Learn
        </h1>

        <a
            href="{{ route('admin.learn.create') }}"
            class="inline-flex items-center justify-center gap-2 rounded-md bg-sp-prairieGreen px-5 py-3 text-sm font-semibold text-white transition-colors hover:bg-sp-prairieGreen/90">

            <x-icons.plus
                class="h-4 w-4"
                aria-hidden="true" />

            Create Article

        </a>

    </div>
    {{-- End Page Header --}}


    {{-- Article Summary --}}
    <div class="mt-6 flex flex-wrap items-center gap-x-4 gap-y-2 text-sm text-sp-slate">

        <span class="font-semibold text-sp-charcoal">
            {{ $articleCounts['total'] }}
            {{ \Illuminate\Support\Str::plural('Article', $articleCounts['total']) }}
        </span>

        <span aria-hidden="true" class="text-sp-slate/30">|</span>

        <span>
            {{ $articleCounts['published'] }} Published
        </span>

        <span>
            {{ $articleCounts['scheduled'] }} Scheduled
        </span>

        <span>
            {{ $articleCounts['draft'] }} Drafts
        </span>

        <span>
            {{ $articleCounts['archived'] }} Archived
        </span>

    </div>
    {{-- End Article Summary --}}


    {{-- Article Library --}}
    <div class="mt-8">

        @if ($articles->isEmpty())

        {{-- Empty Library --}}
        <div class="rounded-lg border border-dashed border-sp-slate/20 px-6 py-12 text-center">

            <h2 class="font-archivo text-lg font-semibold text-sp-charcoal">
                No articles yet
            </h2>

            <p class="mt-2 text-sm text-sp-slate">
                Your Learn library is ready for its first article.
            </p>

            <a
                href="{{ route('admin.learn.create') }}"
                class="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-sp-prairieGreen hover:underline">

                Create Your First Article

                <x-icons.move-right
                    class="h-4 w-4"
                    aria-hidden="true" />

            </a>

        </div>

        @else

        {{-- Article Table --}}
        <div class="overflow-hidden rounded-lg border border-sp-slate/10 bg-white">

            {{-- Table Header --}}
            <div class="hidden gap-6 border-b border-sp-slate/10 bg-sp-warmIvory/50 px-6 py-4 md:grid md:grid-cols-[minmax(0,6fr)_minmax(0,2fr)_minmax(0,2fr)_minmax(0,2fr)]">

                <div>
                    <span class="text-xs font-semibold uppercase tracking-wider text-sp-slate">
                        Article
                    </span>
                </div>

                <div>
                    <span class="text-xs font-semibold uppercase tracking-wider text-sp-slate">
                        Type
                    </span>
                </div>

                <div>
                    <span class="text-xs font-semibold uppercase tracking-wider text-sp-slate">
                        Status
                    </span>
                </div>

                <div class="text-right">
                    <span class="text-xs font-semibold uppercase tracking-wider text-sp-slate">
                        Last Updated
                    </span>
                </div>

            </div>
            {{-- End Table Header --}}


            {{-- Article Rows --}}
            <div class="divide-y divide-sp-slate/10">

                @foreach ($articles as $article)

                @php
                $isScheduled =
                $article->status === 'published'
                && $article->published_at
                && $article->published_at->isFuture();

                $isPublished =
                $article->status === 'published'
                && $article->published_at
                && $article->published_at->lte(now());

                $displayStatus = match (true) {
                $isScheduled => 'Scheduled',
                $isPublished => 'Published',
                $article->status === 'draft' => 'Draft',
                $article->status === 'archived' => 'Archived',
                default => 'Unscheduled',
                };

                $articleType = match ($article->type) {
                'guide' => 'Evergreen Guide',
                'book_review' => 'Book Review',
                default => 'Standard',
                };
                @endphp

                <a
    href="{{ route('admin.learn.edit', $article) }}"
    class="group block px-6 py-4 transition-all duration-150 hover:bg-sp-warmIvory hover:shadow-[inset_3px_0_0_0_#506853] focus-visible:bg-sp-warmIvory focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-sp-prairieGreen">

                    <div class="grid grid-cols-1 gap-4 md:grid-cols-[minmax(0,6fr)_minmax(0,2fr)_minmax(0,2fr)_minmax(0,2fr)] md:items-center md:gap-6">

                        {{-- Article Title --}}
<div class="min-w-0">

                            <h2 class="font-archivo text-lg font-semibold leading-snug text-sp-charcoal transition-colors group-hover:text-sp-prairieGreen">

                                {{ $article->title }}

                            </h2>

                            @if ($isScheduled)

                            <p class="mt-2 text-xs text-sp-slate">
                                Scheduled for
                                {{ $article->published_at->format('M j, Y') }}
                                at
                                {{ $article->published_at->format('g:i A') }}
                                Central
                            </p>

                            @endif

                        </div>
                        {{-- End Article Title --}}


                        {{-- Article Type --}}
<div>

                            <span class="text-sm text-sp-slate">
                                {{ $articleType }}
                            </span>

                        </div>
                        {{-- End Article Type --}}


                        {{-- Publication Status --}}
                        <div>

                            <div class="flex items-center gap-2">

                                @if ($displayStatus === 'Published')

                                <span
                                    class="h-2 w-2 shrink-0 rounded-full bg-sp-prairieGreen"
                                    aria-hidden="true">
                                </span>

                                @elseif ($displayStatus === 'Scheduled')

                                <span
                                    class="h-2 w-2 shrink-0 rounded-full bg-sp-prairieOchre"
                                    aria-hidden="true">
                                </span>

                                @elseif ($displayStatus === 'Draft')

                                <span
                                    class="h-2 w-2 shrink-0 rounded-full bg-sp-slate/40"
                                    aria-hidden="true">
                                </span>

                                @else

                                <span
                                    class="h-2 w-2 shrink-0 rounded-full bg-sp-slate/20"
                                    aria-hidden="true">
                                </span>

                                @endif

                                <span class="text-sm font-medium text-sp-charcoal">
                                    {{ $displayStatus }}
                                </span>

                            </div>

                        </div>
                        {{-- End Publication Status --}}


                        {{-- Last Updated --}}
                        <div class="md:text-right">

                            <span
                                class="text-xs text-sp-slate/70"
                                title="{{ $article->updated_at->format('M j, Y g:i A') }}">

                                {{ $article->updated_at->diffForHumans() }}

                            </span>

                        </div>
                        {{-- End Last Updated --}}

                    </div>

                </a>

                @endforeach

            </div>
            {{-- End Article Rows --}}

        </div>
        {{-- End Article Table --}}


        {{-- Pagination --}}
        @if ($articles->hasPages())

        <div class="mt-6">
            {{ $articles->links() }}
        </div>

        @endif
        {{-- End Pagination --}}

        @endif

    </div>
    {{-- End Article Library --}}

</div>

@endsection