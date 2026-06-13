<?php

namespace App\Services\Blog;

use App\Models\Category;
use App\Models\Tag;
use App\Services\Blog\PostVisibilityService;

class BlogSidebarService
{
    public function __construct(
        protected PostVisibilityService $visibility
    ) {}

    public function get(): array
    {
        $now = now();

        $categories = Category::withCount([
                'posts' => function ($q) use ($now) {
                    $this->visibility->publishedQuery($q, $now);
                }
            ])
            ->having('posts_count', '>', 0)
            ->orderBy('name')
            ->get();

        $tags = Tag::withCount([
                'posts' => function ($q) use ($now) {
                    $this->visibility->publishedQuery($q, $now);
                }
            ])
            ->having('posts_count', '>', 0)
            ->orderBy('name')
            ->get();

        return compact('categories', 'tags');
    }
}