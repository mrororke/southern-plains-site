<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            'Luka',
            'Reactivity',
            'Doberman Pinscher',
            'Canine Good Citizen (CGC)',
            'NASDA',
            'Dog Trainer Journey',
            'Positive Reinforcement',
            'Management',
            'Expectations',
            'Puppyhood',
            'Socialization',
            'Moose',
            'Weimaraner',
            'Resource Guarding',
            'High-Drive Dog',
            'Prong Collar',
            'Training Tools',
            'Early Training',
            'Dog Training Club',
            'Jean Donaldson (Book Mention)',
            'NASDA Judge',
            'NASDA Trial',
            'Cruciate Injury',
            'Volunteering',
            'Rule Interpretation',
            'Search Area Design',
            'Judging Consistency',
            'Canine Sports',
            'Grief',
            'Sudden Loss',
            'Pulmonary Embolism',
            'Reactive Dog Legacy',
            'Fearful Dogs',
            'Veterinary Emergency',
            'Book Review',
            'Nicole Wilde',
            'Private Training',
            'Client Intake',
            'Client Compliance',
            'Business Startup',
            'Training Resources',
            'Professional Development',
            'History Taking',
            'Imposter Syndrome',
        ];

        foreach ($tags as $tag) {
            // 💡 CHANGED: Using the Tag Model, which supports firstOrCreate()
            Tag::firstOrCreate(
                ['name' => $tag],
                [
                    'slug' => Str::slug($tag),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
