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
        Schema::create('rat_litters', function (Blueprint $table) {
            $table->id();

            $table->foreignId('sire_id')->constrained('rats')->cascadeOnDelete();
            $table->foreignId('dam_id')->constrained('rats')->cascadeOnDelete();

            $table->date('dob');

            $table->integer('litter_size');
            $table->integer('no_of_males');
            $table->integer('no_of_females');

            $table->integer('stillborn_count')->nullable();
            $table->integer('weaned_count')->nullable();

            $table->timestamps();

            $table->index(['sire_id', 'dam_id']);
            $table->index('dob');
            $table->unique(['sire_id', 'dam_id', 'dob']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rat_litters');
    }
};
