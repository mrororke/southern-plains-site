<?php

namespace App\Models;

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
        return $this->hasMany(TrickVideo::class);
    }

    public function preferredVideo()
    {
        return $this->hasOne(TrickVideo::class)
            ->where('is_preferred', true);
    }

    public function levels()
{
    return $this->belongsToMany(TrickLevel::class, 'trick_level');
}

    /*
    |--------------------------------------------------------------------------
    | Users
    |--------------------------------------------------------------------------
    */

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}