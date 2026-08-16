<?php

namespace App\Services\Blog;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Services\Blog\PostVisibilityService;

class PostQueryService
{
    public function index(array $filters = [])
    {
        $query = $this->baseQuery();

        if (!empty($filters['search'])) {
            $this->applySearch($query, $filters['search']);
        }

        if (!empty($filters['category'])) {
            $this->applyCategory($query, $filters['category']);
        }

        return $query
            ->orderByDesc('published_at')
            ->paginate(15);
    }

    public function byCategory(Category $category)
    {
        $query = $this->baseQuery();

        $query->where('category_id', $category->id);

        return $query
            ->latest('published_at')
            ->paginate(15);
    }

    public function byTag(Tag $tag, int $perPage = 10)
    {
        $query = $this->baseQuery();

        $query->whereHas('tags', function ($q) use ($tag) {
            $q->where('tags.id', $tag->id);
        });

        return $query
            ->latest('published_at')
            ->paginate($perPage);
    }

    private function baseQuery()
    {
        $query = Post::query();

        $this->applyVisibility($query);

        return $query;
    }

    private function applyVisibility($query)
    {
        app(PostVisibilityService::class)
            ->publishedQuery($query);
    }

    private function applySearch($query, string $term)
    {
        $query->where(function ($q) use ($term) {
            $q->where('title', 'LIKE', "%{$term}%")
              ->orWhere('body', 'LIKE', "%{$term}%");
        });
    }

    private function applyCategory($query, string $slug)
    {
        $category = Category::where('slug', $slug)->first();

        if ($category) {
            $query->where('category_id', $category->id);
        }
    }
}