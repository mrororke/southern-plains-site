<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrickVideo extends Model
{
    use HasFactory;

    protected $fillable = [
        'trick_id',
        'url',
        'platform',
        'creator',
        'is_preferred',
        'notes',
        'created_by',
        'updated_by'
    ];

    /*
    |-------------------------------------------------
    | RELATIONSHIP
    |-------------------------------------------------
    */
    
    public function trick(){
        return $this->belongsTo(Trick::class);
    }

    /*
    |-------------------------------------------------
    | SCOPES
    |-------------------------------------------------
    */

    public function scopePreferred($query){
        return $query->where('is_preferred', true);
    }

    public function scopePlatform($query, $platform){
        return $query->where('platform', $platform);
    }

    public static function detectPlatform(string $url): string
{
    return match (true) {
        str_contains($url, 'tiktok') => 'tiktok',
        str_contains($url, 'instagram') => 'instagram',
        str_contains($url, 'facebook') => 'facebook',
        str_contains($url, 'youtube') => 'youtube',
        default => 'unknown',
    };
}

}
