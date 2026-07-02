<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrickLevel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function tricks()
{
    return $this->belongsToMany(
        Trick::class,
        'trick_level',
        'trick_level_id',
        'trick_id'
    );
}
}
