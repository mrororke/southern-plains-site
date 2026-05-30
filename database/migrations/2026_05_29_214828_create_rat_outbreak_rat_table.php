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
        Schema::create('rat_outbreak_rat', function (Blueprint $table) {
            $table->foreignId('rat_outbreak_id')->constrained('rat_outbreaks')->cascadeOnDelete();
            $table->foreignId('rat_id')->constrained('rats')->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['rat_outbreak_id', 'rat_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rat_outbreak_rat');
    }
};
