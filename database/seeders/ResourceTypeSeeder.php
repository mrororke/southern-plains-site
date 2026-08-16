<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResourceTypeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('resource_types')->updateOrInsert(
            ['name' => 'Email'],
            [
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        DB::table('resource_types')->updateOrInsert(
            ['name' => 'Document'],
            [
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        DB::table('resource_types')->updateOrInsert(
            ['name' => 'Reference'],
            [
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}