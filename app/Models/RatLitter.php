<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatLitter extends Model
{
    use HasFactory;

    protected $fillable = [
        'sire_id',
        'dam_id',
        'dob',
        'litter_size',
        'no_of_males',
        'no_of_females',
        'stillborn_count',
        'weaned_count',
    ];

    public function sire()
    {
        return $this->belongsTo(Rat::class, 'sire_id');
    }

    public function dam()
    {
        return $this->belongsTo(Rat::class, 'dam_id');
    }

    public function rats()
    {
        return $this->hasMany(Rat::class, 'litter_id');
    }
}
