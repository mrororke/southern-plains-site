<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatBreeder extends Model
{
    use HasFactory;

    public function rats()
    {
        return $this->hasMany(\App\Models\Rat::class, 'breeder_id');
    }
}
