<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatColor extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function rats()
    {
        return $this->belongsToMany(
        Rat::class,
        'rat_color_rat'
    );
    }
}
