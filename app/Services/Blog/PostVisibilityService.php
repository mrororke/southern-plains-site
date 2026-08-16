<?php

namespace App\Services\Blog;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class PostVisibilityService
{
    /**
     * Restrict query to published posts only
     */
    public function publishedQuery(Builder $query, Carbon|string|null $date = null): Builder
    {
        $date = $date ? Carbon::parse($date) : now();

        return $query
            ->whereNotNull('published_at')
            ->where('published_at', '<=', $date);
    }
}