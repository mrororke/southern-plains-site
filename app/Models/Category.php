<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    // -- RELATIONSHIPS --
    // A category can have many posts
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
