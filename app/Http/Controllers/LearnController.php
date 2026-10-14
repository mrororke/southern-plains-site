<?php

namespace App\Http\Controllers;

use App\Models\LearnArticle;
use App\Models\LearnCategory;
use App\Models\LearnTag;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LearnController extends Controller
{
    /**
     * Display the public Learn archive.
     */
    public function index(Request $request): View
    {
        $selectedCategory = null;

        if ($request->filled('category')) {
            $selectedCategory = LearnCategory::query()
                ->where('slug', $request->query('category'))
                ->firstOrFail();
        }

        $selectedTag = null;

        if ($request->filled('tag')) {
            $selectedTag = LearnTag::query()
                ->where('slug', $request->query('tag'))
                ->firstOrFail();
        }

        $publishedArticles = LearnArticle::query()
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());

        if ($request->filled('search')) {
            $search = trim($request->query('search'));

            $publishedArticles->where(function ($query) use ($search) {
                $query
                    ->where('title', 'like', '%' . $search . '%')
                    ->orWhere('excerpt', 'like', '%' . $search . '%')
                    ->orWhere('introduction', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%');
            });
        }

        if ($selectedCategory) {
            $publishedArticles->whereHas(
                'categories',
                function ($query) use ($selectedCategory) {
                    $query->where(
                        'learn_categories.id',
                        $selectedCategory->id
                    );
                }
            );
        }

        if ($selectedTag) {
            $publishedArticles->whereHas(
                'tags',
                function ($query) use ($selectedTag) {
                    $query->where(
                        'learn_tags.id',
                        $selectedTag->id
                    );
                }
            );
        }

        $featuredArticle = (clone $publishedArticles)
            ->whereIn('type', ['standard', 'guide'])
            ->with([
                'categories',
                'tags',
                'images',
                'bookReview',
            ])
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->first();

        $articles = (clone $publishedArticles)
            ->when(
                $featuredArticle,
                fn($query) => $query->whereKeyNot(
                    $featuredArticle->id
                )
            )
            ->with([
                'categories',
                'tags',
                'images',
                'bookReview',
            ])
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->paginate(12)
            ->withQueryString();

        $featuredTopicSlugs = [
            'nasda',
            'getting-started-in-dog-sports',
            'positive-reinforcement',
            'reactive-dogs',
            'trick-training',
            'canine-fitness',
        ];

        $availableTopics = LearnTag::query()
            ->whereIn('slug', $featuredTopicSlugs)
            ->whereHas('articles', function ($query) {
                $query
                    ->where('status', 'published')
                    ->whereNotNull('published_at')
                    ->where('published_at', '<=', now());
            })
            ->get()
            ->sortBy(
                fn($tag) => array_search(
                    $tag->slug,
                    $featuredTopicSlugs,
                    true
                )
            )
            ->values();

        $topics = $availableTopics
            ->map(function ($tag) use ($selectedCategory) {
                $parameters = [
                    'tag' => $tag->slug,
                ];

                if ($selectedCategory) {
                    $parameters['category'] = $selectedCategory->slug;
                }

                return [
                    'label' => $tag->name,
                    'href' => route(
                        'public-v2.learn.index',
                        $parameters
                    ),
                ];
            })
            ->all();

        return view('public-v2.learn.index', [
            'featuredArticle' => $featuredArticle,
            'articles' => $articles,
            'selectedCategory' => $selectedCategory,
            'selectedTag' => $selectedTag,
            'topics' => $topics,
        ]);
    }

    /**
     * Display an individual published Learn article.
     */
    public function show(LearnArticle $article): View
    {
        abort_unless(
            $article->status === 'published'
                && $article->published_at
                && $article->published_at->lte(now()),
            404
        );

        $article->load([
            'categories',
            'tags',
            'images',
            'bookReview',
        ]);

        /*
         * Load manually selected Keep Learning articles.
         *
         * Only published articles are displayed.
         * Results are ordered newest first.
         * No automatic recommendations or fallback.
         */
        $relatedArticles = $article->relatedArticles()
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->with([
                'categories',
                'tags',
                'images',
                'bookReview',
            ])
            ->orderByDesc('published_at')
            ->orderByDesc('learn_articles.id')
            ->limit(4)
            ->get();

        $template = match ($article->type) {
            'guide' => 'public-v2.learn.guide',
            'book_review' => 'public-v2.learn.book-review',
            default => 'public-v2.learn.article',
        };

        return view($template, [
            'article' => $article,
            'relatedArticles' => $relatedArticles,
        ]);
    }
}
