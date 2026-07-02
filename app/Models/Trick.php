<?php

namespace App\Models;

use App\Models\TrickLevel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trick extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'level',
        'notes',
        'created_by',
        'updated_by'
    ];

    /*
    |---------------------------------
    RELATIONSHIPS
    |---------------------------------
    */

    public function videos(){
        return $this->hasMany(TrickVideo::class);
    }

    public function preferredVideo(){
        return $this->hasOne(TrickVideo::class)->where('is_preferred', true);
    }

    public function levels()
{
    return $this->belongsToMany(
        TrickLevel::class,
        'trick_level',
        'trick_id',
        'trick_level_id'
    );
}

     /*
    |---------------------------------
    USERS
    |---------------------------------
    */

    public function creator(){
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater(){
        return $this->belongsTo(User::class, 'updated_by');
    }
}
