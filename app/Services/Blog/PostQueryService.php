class PostQueryService
{
    public function index(array $filters = [])
    {
        $query = Post::query();

        $this->applyVisibility($query);

        if (!empty($filters['search'])) {
            $this->applySearch($query, $filters['search']);
        }

        if (!empty($filters['category'])) {
            $this->applyCategory($query, $filters['category']);
        }

        return $query->orderByDesc('published_at')
            ->paginate(15);
    }

    public function byCategory(Category $category)
    {
        $query = $category->posts();

        $this->applyVisibility($query);

        return $query
            ->latest('published_at')
            ->paginate(15);
    }

    public function byTag(Tag $tag, int $perPage = 10)
    {
        $query = $tag->posts();

        $this->applyVisibility($query);

        return $query
            ->latest('published_at')
            ->paginate($perPage);
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