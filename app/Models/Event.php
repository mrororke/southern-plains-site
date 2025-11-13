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
            1 => 'Club Meeting',
            2 => 'League Day',
            3 => 'Training Seminar',
            4 => 'Other Event',
            default => 'Unknown',
        };
    }

    /**
     * Helper method to get a CSS class based on the category for styling.
     */
    public function getCategoryClassAttribute()
    {
        return match ($this->category_id) {
            1 => 'bg-club text-black', // Club
            2 => 'bg-green-100 text-green-700 border-green-500', // League
            3 => 'bg-yellow-100 text-yellow-700 border-yellow-500', // Training
            4 => 'bg-gray-100 text-gray-700 border-gray-500', // Other
            default => 'bg-gray-100 text-gray-700 border-gray-500',
        };
    }
}