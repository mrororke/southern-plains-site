<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatTemperamentAssessment extends Model
{
    use HasFactory;
    
    public function rat()
    {
        return $this->belongsTo(Rat::class);
    }
}
