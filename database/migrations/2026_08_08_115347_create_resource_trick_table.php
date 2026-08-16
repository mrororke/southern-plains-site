<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /*
    |--------------------------------------------------------------------------
    | Resource ↔ Behavior
    |--------------------------------------------------------------------------
    |
    | Connects Resources to Behaviors.
    |
    | A Resource may reference multiple Behaviors, and the same Behavior
    | may appear in many Resources.
    |
    */

    public function up(): void
    {
        Schema::create('resource_trick', function (Blueprint $table) {
            $table->id();

            $table->foreignId('resource_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('trick_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->timestamps();

            $table->unique([
                'resource_id',
                'trick_id',
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('resource_trick');
    }
};