class BlogSidebarService
{
    public function get()
    {
        $now = now();

        $categories = Category::withCount([
                'posts' => fn($q) =>
                    $q->whereNotNull('published_at')
                      ->where('published_at', '<=', $now)
            ])
            ->having('posts_count', '>', 0)
            ->orderBy('name')
            ->get();

        $tags = Tag::withCount([
                'posts' => fn($q) =>
                    $q->whereNotNull('published_at')
                      ->where('published_at', '<=', $now)
            ])
            ->having('posts_count', '>', 0)
            ->orderBy('name')
            ->get();

        return compact('categories', 'tags');
    }
}