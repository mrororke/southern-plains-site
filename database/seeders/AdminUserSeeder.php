<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->updateOrInsert(
            ['email' => 'southernplainssportdogclub@gmail.com'], // Unique key for update/insert
            [
                'name' => "Melanie O'Rorke",
                'password' => Hash::make('muDjez-synvi9-kohzum'), // 💡 USE A STRONG PASSWORD
                'email_verified_at' => now(),
                'is_admin' => true, // 💡 THIS IS THE KEY FLAG
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
