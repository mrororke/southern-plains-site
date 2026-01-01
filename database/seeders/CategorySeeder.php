<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categories = [
            'Personal Journey / Handler Insights',
            'Canine Behavior & Training',
            'Dog Sports & Competition',
            'Foundation & Manners',
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category,
                'slug' => Str::slug($category), // Generates a URL-friendly slug
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
