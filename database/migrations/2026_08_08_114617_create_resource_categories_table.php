<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /*
    |--------------------------------------------------------------------------
    | Resource Categories
    |--------------------------------------------------------------------------
    |
    | Provides the fixed lookup values used to organize Resources into
    | major areas of the club.
    |
    | Categories are retired with is_active rather than deleted so that
    | historical Resources can preserve their original classification.
    |
    */

    public function up(): void
    {
        Schema::create('resource_categories', function (Blueprint $table) {
            $table->id();

            $table->string('name')->unique();

            $table->boolean('is_active')
                ->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('resource_categories');
    }
};