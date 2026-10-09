<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LearnArticle;
use Illuminate\View\View;

class LearnController extends Controller
{
    /**
     * Display the public Learn archive.
     */
    public function index(): View
    {
        $publishedArticles = LearnArticle::query()
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());

        /*
         * Feature the newest published Standard Article
         * or Evergreen Guide. Never feature Book Reviews.
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
         * Display all remaining published content,
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
            ->paginate(12);

        return view('public-v2.learn.index', [
            'featuredArticle' => $featuredArticle,
            'articles' => $articles,
        ]);
    }
}