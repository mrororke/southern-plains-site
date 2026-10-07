<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LearnBookReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id',
        'book_title',
        'book_author',
        'rating',
        'cover_image_path',
    ];

    protected $casts = [
        'rating' => 'integer',
    ];

    public function article(): BelongsTo
    {
        return $this->belongsTo(
            LearnArticle::class,
            'article_id'
        );
    }
}