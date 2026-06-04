<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatOutbreak extends Model
{
    use HasFactory;

    public function rats()
    {
        return $this->belongsToMany(
            Rat::class,
            'rat_outbreak_rat'
        );
    }
}
