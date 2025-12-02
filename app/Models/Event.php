<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    /**
     * The attributes that should be cast.
     * These cast the database strings into Carbon objects for easy manipulation.
     */
    protected $casts = [
        'date' => 'date', 
    ];

    /**
     * Define the key for route model binding to use the slug instead of the ID.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Helper method to get the category name based on the ID.
     */
    public function getCategoryNameAttribute()
    {
        return match ($this->category_id) {
            1 => 'club',
            2 => 'league',
            3 => 'training',
            4 => 'other',
            5 => 'disabled',
            default => 'club',
        };
    }

    /**
     * Helper method to get a CSS class based on the category for styling.
     */
    public function getCategoryClassAttribute()
    {
        return match ($this->category_id) {
            1 => '[#4CBB17]', // Club
            2 => '[#FF0398]', // League
            3 => '[#03CCFF]', // Training
            4 => 'white text-black border-gray-500', // Other
            5 => 'disabled', // disabled
            default => 'white text-black border-gray-500',
        };
    }

    

}