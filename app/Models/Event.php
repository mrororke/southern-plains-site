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
            1 => 'Club Event',
            2 => 'League Event',
            3 => 'Training Event',
            4 => 'Other Event',
            default => 'Other Event',
        };
    }

    /**
     * Helper method to get a CSS class based on the category for styling.
     */
    public function getCategoryClassAttribute()
    {
        return match ($this->category_id) {
            1 => 'bg-[#4CBB17]/50 text-black', // Club
            2 => 'bg-[#FF0398]/50 text-black', // League
            3 => 'bg-[#03CCFF]/50 text-black', // Training
            4 => 'bg-white text-black border-gray-500', // Other
            default => 'bg-white text-black border-gray-500',
        };
    }
}