<?php

namespace App\Models\TeachingLibrary;

use App\Models\TeachingLibrary\Resource;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ResourceTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($tag) {

            $tag->slug = Str::slug($tag->name);

        });

        static::updating(function ($tag) {

            if ($tag->isDirty('name')) {
                $tag->slug = Str::slug($tag->name);
            }

        });
    }

    public function resources(){
        return $this->belongsToMany(Resource::class);
    }
}
