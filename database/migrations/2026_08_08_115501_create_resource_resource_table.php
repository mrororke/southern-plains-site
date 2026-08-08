<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /*
    |--------------------------------------------------------------------------
    | Resource ↔ Resource
    |--------------------------------------------------------------------------
    |
    | Connects related Resources to one another.
    |
    | Relationships are treated as bidirectional in the application.
    | Before saving, the lower Resource ID is stored as resource_id and
    | the higher Resource ID is stored as related_resource_id.
    |
    | This relationship is separate from based_on_resource_id, which
    | represents lineage rather than general related content.
    |
    */

    public function up(): void
    {
        Schema::create('resource_resource', function (Blueprint $table) {
            $table->id();

            $table->foreignId('resource_id')
                ->constrained('resources')
                ->cascadeOnDelete();

            $table->foreignId('related_resource_id')
                ->constrained('resources')
                ->cascadeOnDelete();

            $table->timestamps();

            $table->unique([
                'resource_id',
                'related_resource_id',
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('resource_resource');
    }
};