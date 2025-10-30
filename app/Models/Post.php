<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //add the fillable fields for mass assignment when creating posts
    protected $fillable = [
        'title',
        'slug',
        'body',
        'meta_title',
        'meta_description',
        'hero_image_path',
        'published_at',
        'category_id',
        'has_affiliate_links',
    ];

    // cast the publish_at column to a date/datetime object
    protected $casts = [
        'published_at' => 'datetime',
        'has_affiliate_links' => 'boolean',
    ];

    // -- RELATIONSHIPS --
    //a post belongs to one category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // a post can have many tags
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
