<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /*
    |--------------------------------------------------------------------------
    | Resources
    |--------------------------------------------------------------------------
    |
    | Stores the primary documents within the Resource Library.
    |
    | Resources are living documents that may evolve over time,
    | belong to a Series, reference another Resource, and connect
    | to other objects throughout the application.
    |
    */

    public function up(): void
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->id();

            $table->string('title');

            $table->longText('body');

            $table->foreignId('resource_category_id')
                ->constrained()
                ->restrictOnDelete();

            $table->foreignId('resource_type_id')
                ->constrained()
                ->restrictOnDelete();

            $table->foreignId('resource_series_id')
                ->nullable()
                ->constrained()
                ->restrictOnDelete();

            $table->foreignId('based_on_resource_id')
                ->nullable()
                ->constrained('resources')
                ->nullOnDelete();

            $table->enum('status', [
                'active',
                'archived',
            ])->default('active');

            $table->date('first_sent')
                ->nullable();

            $table->foreignId('created_by')
                ->constrained('users')
                ->restrictOnDelete();

            $table->foreignId('updated_by')
                ->constrained('users')
                ->restrictOnDelete();

            $table->timestamps();

            
            $table->index('status');
            $table->index('first_sent');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('resources');
    }
};