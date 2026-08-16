<?php

namespace App\Models;

use App\Models\ResourceLibrary\Resource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trick extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'notes',
        'created_by',
        'updated_by',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function videos()
    {
        return $this->hasMany(
            TrickVideo::class
        );
    }

    public function preferredVideo()
    {
        return $this->hasOne(
            TrickVideo::class
        )
            ->where(
                'is_preferred',
                true
            );
    }

    public function levels()
    {
        return $this->belongsToMany(
            TrickLevel::class,
            'trick_level'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Resources
    |--------------------------------------------------------------------------
    */

    public function resources()
    {
        return $this->belongsToMany(
            Resource::class,
            'resource_trick',
            'trick_id',
            'resource_id'
        )->withTimestamps();
    }

    /*
    |--------------------------------------------------------------------------
    | Users
    |--------------------------------------------------------------------------
    */

    public function creator()
    {
        return $this->belongsTo(
            User::class,
            'created_by'
        );
    }

    public function updater()
    {
        return $this->belongsTo(
            User::class,
            'updated_by'
        );
    }
}