<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\RatBreeder;
use App\Models\RatLitter;
use App\Models\RatWeight;
use App\Models\RatHealthRecord;
use App\Models\RatTemperamentAssessment;
use App\Models\RatAttachment;
use App\Models\RatOutbreak;

class Rat extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'registered_name',
        'breeder_reference',
        'sex',
        'dob',
        'dod',
        'variety',
        'color',
        'silvered',
        'markings',
        'eye_color',
        'ear_set',
        'breeder_id',
        'sire_id',
        'dam_id',
        'temperament',
        'deformities',
        'abnormalities',
        'is_owned',
        'is_pedigree_only',
    ];

    // Parents
    public function sire()
    {
        return $this->belongsTo(Rat::class, 'sire_id');
    }

    public function dam()
    {
        return $this->belongsTo(Rat::class, 'dam_id');
    }

    // Breeder
    public function breeder()
    {
        return $this->belongsTo(RatBreeder::class, 'breeder_id');
    }

    // Litters (derived)
    public function littersAsSire()
    {
        return $this->hasMany(RatLitter::class, 'sire_id');
    }

    public function littersAsDam()
    {
        return $this->hasMany(RatLitter::class, 'dam_id');
    }

    // Time-series data
    public function weights()
    {
        return $this->hasMany(RatWeight::class);
    }

    public function healthRecords()
    {
        return $this->hasMany(RatHealthRecord::class);
    }

    public function temperamentAssessments()
    {
        return $this->hasMany(RatTemperamentAssessment::class);
    }

    // Media
    public function attachments()
    {
        return $this->hasMany(RatAttachment::class);
    }

    // Outbreaks
    public function outbreaks()
    {
        return $this->belongsToMany(
            RatOutbreak::class,
            'rat_outbreak_rat',
            'rat_id',
            'rat_outbreak_id'
        );
    }

    public static function sexes()
    {
        return ['Male', 'Female'];
    }

    public static function varieties()
    {
        return [
            'Standard',
            'Rex',
            'Tailless',
            'Hairless',
            'Satin',
            'Dumbo',
            'Bristle Coat',
            'Velveteen',
            'Teddy Rex'
        ];
    }

    public static function colorOptions()
    {
        return [
            'Agouti',
            'Beige',
            'Black',
            'Black Eyed Siamese',
            'Black Eyed White',
            'Black Marten',
            'Blue',
            'Blue Agouti',
            'Blue-Beige',
            'Burmese',
            'Champagne',
            'Chinchilla',
            'Chocolate',
            'Cinnamon',
            'Cinnamon Pearl',
            'Cocoa',
            'Fawn',
            'Himalayan',
            'Lilac',
            'Lynx',
            'Merle',
            'Mink',
            'Pearl',
            'P.E. Platinum',
            'Platinum',
            'Pink Eyed White',
            'Powder Blue',
            'Russian Blue',
            'Russian Blue Agouti',
            'Russian Blue Agouti Burmese',
            'Russian Blue Point Siamese',
            'Russian Dove',
            'Seal point Siamese',
            'Siamese',
            'Silvermane',
            'Sky Blue'
        ];
    }

    public static function silveredOptions()
    {
        return [
            'Amber',
            'Silver Black',
            'Silver Blue',
            'Silver Chocolate',
            'Silver Fawn',
            'Silver Lilac',
            'Silver Mink'
        ];
    }

    public static function markingOptions()
    {
        return [
            'Bareback',
            'Berkshire',
            'Blaze',
            'Capped',
            'Dalmatian',
            'Down Under',
            'English Irish',
            'Essex',
            'Hooded',
            'Irish',
            'Masked',
            'Self',
            'Variegated'
        ];
    }

    public static function eyeColors()
    {
        return ['Black', 'Odd Eye', 'Pink', 'Ruby'];
    }

    public static function earSets()
    {
        return ['Dumbo', 'Top'];
    }

    public function colors()
    {
        return $this->belongsToMany(
        RatColor::class,
        'rat_color_rat'
    );
    }

    public function markings()
    {
        return $this->belongsToMany(
        RatMarking::class,
        'rat_marking_rat'
    );
    }
}
