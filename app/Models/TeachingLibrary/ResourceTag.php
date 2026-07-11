<?php

namespace App\Models\TeachingLibrary;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourceTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];
}
