<?php

namespace App\Http\Controllers;

use App\Models\LearnArticle;
use App\Models\LearnCategory;
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
         * An invalid category returns a 404.
         */
        $selectedCategory = null;

        if ($request->filled('category')) {
            $selectedCategory = LearnCategory::query()
                ->where('slug', $request->query('category'))
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
         * Apply the category filter to both the featured
         * article and the regular archive.
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
         * The newest published Standard Article or
         * Evergreen Guide is automatically featured.
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
         * Display all remaining published articles,
         * including Book Reviews, newest first.
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

        return view('public-v2.learn.index', [
            'featuredArticle' => $featuredArticle,
            'articles' => $articles,
            'selectedCategory' => $selectedCategory,
        ]);
    }
}