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
        /*
         * Resolve the selected category.
         */
        $selectedCategory = null;

        if ($request->filled('category')) {
            $selectedCategory = LearnCategory::query()
                ->where('slug', $request->query('category'))
                ->firstOrFail();
        }

        /*
         * Resolve the selected topic.
         */
        $selectedTag = null;

        if ($request->filled('tag')) {
            $selectedTag = LearnTag::query()
                ->where('slug', $request->query('tag'))
                ->firstOrFail();
        }

        /*
         * Only publicly eligible articles are displayed.
         */
        $publishedArticles = LearnArticle::query()
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());

        /*
         * Apply the category filter.
         */
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

        /*
         * Apply the topic filter.
         *
         * Category and topic filters can be combined.
         */
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

        /*
         * Automatically feature the newest published
         * Standard Article or Evergreen Guide.
         *
         * Book Reviews are never featured.
         */
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

        /*
         * Display the remaining published articles.
         */
        $articles = (clone $publishedArticles)
            ->when(
                $featuredArticle,
                fn ($query) => $query->whereKeyNot(
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

        /*
         * Curated Browse by Topic selections.
         *
         * These are the six topics we've chosen
         * to feature initially.
         */
        $featuredTopicSlugs = [
            'nasda',
            'getting-started-in-dog-sports',
            'positive-reinforcement',
            'reactive-dogs',
            'trick-training',
            'canine-fitness',
        ];

        /*
         * Retrieve curated topics that have at least
         * one publicly eligible article.
         */
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
                fn ($tag) => array_search(
                    $tag->slug,
                    $featuredTopicSlugs,
                    true
                )
            )
            ->values();

        /*
         * Build links for the existing Browse by Topic
         * component.
         */
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
}