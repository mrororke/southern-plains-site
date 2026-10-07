<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class LearnArticle extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'status',
        'title',
        'slug',
        'excerpt',
        'body',
        'last_reviewed_at',
        'has_affiliate_links',
        'is_featured',
        'seo_title',
        'seo_description',
        'published_at',
    ];

    protected $casts = [
        'last_reviewed_at' => 'date',
        'has_affiliate_links' => 'boolean',
        'is_featured' => 'boolean',
        'published_at' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(
            LearnCategory::class,
            'learn_article_category',
            'article_id',
            'category_id'
        )->withTimestamps();
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(
            LearnTag::class,
            'learn_article_tag',
            'article_id',
            'tag_id'
        )->withTimestamps();
    }

    public function images(): HasMany
    {
        return $this->hasMany(
            LearnArticleImage::class,
            'article_id'
        )->orderBy('sort_order');
    }

    public function bookReview(): HasOne
    {
        return $this->hasOne(
            LearnBookReview::class,
            'article_id'
        );
    }
}