<?php

namespace App\Models\ResourceLibrary;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ResourceCategory extends Model
{
    protected $fillable = [
        'name',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function resources(): HasMany
    {
        return $this->hasMany(Resource::class);
    }

    public function series(): HasMany
    {
        return $this->hasMany(ResourceSeries::class);
    }
}