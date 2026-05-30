<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatHealthRecord extends Model
{
    use HasFactory;

    public function rat()
    {
        return $this->belongsTo(Rat::class);
    }

    public function treatments()
    {
        return $this->hasMany(RatTreatment::class, 'health_record_id');
    }
}
