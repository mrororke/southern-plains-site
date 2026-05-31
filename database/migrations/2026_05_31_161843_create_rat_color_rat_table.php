<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rat_color_rat', function (Blueprint $table) {
            $table->foreignId('rat_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('rat_color_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->primary([
                'rat_id',
                'rat_color_id'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rat_color_rat');
    }
};
