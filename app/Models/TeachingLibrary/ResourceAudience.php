<?php

namespace App\Models\TeachingLibrary;

use App\Models\TeachingLibrary\Resource;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ResourceAudience extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($audience) {

            $audience->slug = Str::slug($audience->name);

        });
    }

    public function resources(){
        return $this->belongsToMany(Resource::class);
    }
}
