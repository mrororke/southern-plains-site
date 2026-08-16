<?php

namespace App\Models\ResourceLibrary;

use App\Models\Trick;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class Resource extends Model
{
    protected $fillable = [
        'title',
        'body',
        'resource_category_id',
        'resource_type_id',
        'resource_series_id',
        'year',
        'session',
        'week_number',
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
    | Version History
    |--------------------------------------------------------------------------
    */

    public function versionHistory(): Collection
{
    $root = $this;

    while ($root->based_on_resource_id) {

        $root = $root->basedOn()->first();

        if (! $root) {
            break;
        }
    }

    if (! $root) {
        return collect([$this]);
    }

    $history = collect();

    $collectVersions = function (
        Resource $resource
    ) use (&$collectVersions, $history): void {

        $history->push($resource);

        $resource->derivedResources()
            ->get()
            ->each(function (
                Resource $derived
            ) use (&$collectVersions) {

                $collectVersions($derived);

            });
    };

    $collectVersions($root);

    $sessionOrder = [
        'winter' => 1,
        'spring' => 2,
        'summer' => 3,
        'fall' => 4,
    ];

    return $history
        ->unique('id')
        ->sort(function (Resource $a, Resource $b) use ($sessionOrder) {

            /*
            |--------------------------------------------------------------------------
            | First Sent (Newest First)
            |--------------------------------------------------------------------------
            */

            if ($a->first_sent && $b->first_sent) {

                return $b->first_sent->timestamp
                    <=>
                    $a->first_sent->timestamp;
            }

            if ($a->first_sent && ! $b->first_sent) {
                return -1;
            }

            if (! $a->first_sent && $b->first_sent) {
                return 1;
            }

            /*
            |--------------------------------------------------------------------------
            | Planned Delivery
            |--------------------------------------------------------------------------
            */

            $yearCompare =
                ($b->year ?? 0)
                <=>
                ($a->year ?? 0);

            if ($yearCompare !== 0) {
                return $yearCompare;
            }

            $sessionCompare =
                ($sessionOrder[$b->session] ?? 0)
                <=>
                ($sessionOrder[$a->session] ?? 0);

            if ($sessionCompare !== 0) {
                return $sessionCompare;
            }

            $weekCompare =
                ($b->week_number ?? 0)
                <=>
                ($a->week_number ?? 0);

            if ($weekCompare !== 0) {
                return $weekCompare;
            }

            /*
            |--------------------------------------------------------------------------
            | Final Fallback
            |--------------------------------------------------------------------------
            */

            return $b->created_at->timestamp
                <=>
                $a->created_at->timestamp;
        })
        ->values();
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