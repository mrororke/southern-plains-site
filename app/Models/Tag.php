<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';
    protected $fillable = ['name', 'slug'];

    // -- RELATIONSHIPS --
    // a tag can belong to many posts
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
