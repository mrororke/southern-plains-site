@extends('admin.dashboard-v2.desktop')

@section('title', 'Learn')

@section('content')
    <div class="dashboard-content">
        <div class="py-4">
            <img
                src="{{ asset('images/headers/header-learn.jpg') }}"
                alt="Hamish, a shetland sheepdog, in a field of wildflowers."
                class="rounded-md"
            >
        </div>

        <h1 class="font-sans text-sp-charcoal font-semibold text-6xl">
            Learn
        </h1>

        <div class="mt-8">
            @if ($articles->isEmpty())
                <div class="rounded-lg border border-dashed border-sp-slate/20 px-6 py-12 text-center">
                    <h2 class="font-archivo text-lg font-semibold text-sp-slate">
                        No articles yet
                    </h2>

                    <p class="mt-2 text-sm text-sp-slate/70">
                        Your Learn library is ready for its first article.
                    </p>
                </div>
            @else
                <div class="space-y-3">
                    @foreach ($articles as $article)
                        <div class="rounded-lg border border-sp-slate/10 bg-white px-5 py-4">
                            <div class="flex items-center justify-between gap-4">
                                <div>
                                    <h2 class="font-medium text-sp-slate">
                                        {{ $article->title }}
                                    </h2>

                                    <p class="mt-1 text-sm text-sp-slate/60">
                                        {{ ucfirst(str_replace('_', ' ', $article->type)) }}
                                        ·
                                        {{ ucfirst($article->status) }}
                                    </p>
                                </div>

                                <p class="shrink-0 text-sm text-sp-slate/50">
                                    Updated {{ $article->updated_at->diffForHumans() }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if ($articles->hasPages())
                    <div class="mt-6">
                        {{ $articles->links() }}
                    </div>
                @endif
            @endif
        </div>
    </div>
@endsection