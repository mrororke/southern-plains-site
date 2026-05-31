<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatMarking extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function rats()
    {
        return $this->belongsToMany(Rat::class);
    }
}
