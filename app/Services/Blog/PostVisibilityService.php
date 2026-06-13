class PostVisibilityService
{
    public function publishedQuery($query, $date = null)
    {
        $date = $date ?? now();

        return $query
            ->whereNotNull('published_at')
            ->where('published_at', '<=', $date);
    }
}