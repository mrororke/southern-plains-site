<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /*
    |--------------------------------------------------------------------------
    | Resource Types
    |--------------------------------------------------------------------------
    |
    | Provides the fixed lookup values used to describe what kind of
    | Resource is being stored.
    |
    | Types are retired with is_active rather than deleted so that
    | historical Resources can preserve their original type.
    |
    */

    public function up(): void
    {
        Schema::create('resource_types', function (Blueprint $table) {
            $table->id();

            $table->string('name')->unique();

            $table->boolean('is_active')
                ->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('resource_types');
    }
};