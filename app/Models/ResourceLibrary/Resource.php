<?php

namespace App\Models\ResourceLibrary;

use App\Models\Trick;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Resource extends Model
{
    protected $fillable = [
        'title',
        'body',
        'resource_category_id',
        'resource_type_id',
        'resource_series_id',
        'based_on_resource_id',
        'status',
        'first_sent',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'first_sent' => 'date',
    ];

    /*
    |--------------------------------------------------------------------------
    | Core Relationships
    |--------------------------------------------------------------------------
    */

    public function category(): BelongsTo
    {
        return $this->belongsTo(
            ResourceCategory::class,
            'resource_category_id'
        );
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(
            ResourceType::class,
            'resource_type_id'
        );
    }

    public function series(): BelongsTo
    {
        return $this->belongsTo(
            ResourceSeries::class,
            'resource_series_id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Lineage
    |--------------------------------------------------------------------------
    */

    public function basedOn(): BelongsTo
    {
        return $this->belongsTo(
            Resource::class,
            'based_on_resource_id'
        );
    }

    public function derivedResources(): HasMany
    {
        return $this->hasMany(
            Resource::class,
            'based_on_resource_id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Behaviors
    |--------------------------------------------------------------------------
    */

    public function tricks(): BelongsToMany
    {
        return $this->belongsToMany(
            Trick::class,
            'resource_trick'
        )->withTimestamps();
    }

    /*
    |--------------------------------------------------------------------------
    | Related Resources
    |--------------------------------------------------------------------------
    */

    public function relatedResources(): BelongsToMany
    {
        return $this->belongsToMany(
            Resource::class,
            'resource_resource',
            'resource_id',
            'related_resource_id'
        )->withTimestamps();
    }

    public function inverseRelatedResources(): BelongsToMany
    {
        return $this->belongsToMany(
            Resource::class,
            'resource_resource',
            'related_resource_id',
            'resource_id'
        )->withTimestamps();
    }

    /*
    |--------------------------------------------------------------------------
    | Audit Relationships
    |--------------------------------------------------------------------------
    */

    public function creator(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'created_by'
        );
    }

    public function updater(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'updated_by'
        );
    }
}