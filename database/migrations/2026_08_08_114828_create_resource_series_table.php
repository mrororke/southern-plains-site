<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /*
    |--------------------------------------------------------------------------
    | Resource Series
    |--------------------------------------------------------------------------
    |
    | Groups multiple versions of the same communication over time.
    |
    | Series belong to a single Resource Category and are created
    | automatically as needed when Resources are created.
    |
    */

    public function up(): void
    {
        Schema::create('resource_series', function (Blueprint $table) {
            $table->id();

            $table->string('name');

            $table->foreignId('resource_category_id')
                ->constrained()
                ->restrictOnDelete();

            $table->foreignId('created_by')
                ->constrained('users')
                ->restrictOnDelete();

            $table->timestamps();

            $table->unique([
                'resource_category_id',
                'name',
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('resource_series');
    }
};