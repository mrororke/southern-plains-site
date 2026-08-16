<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResourceCategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('resource_categories')->updateOrInsert(
            ['name' => 'Tricks'],
            [
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        DB::table('resource_categories')->updateOrInsert(
            ['name' => 'Fit Dog'],
            [
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}