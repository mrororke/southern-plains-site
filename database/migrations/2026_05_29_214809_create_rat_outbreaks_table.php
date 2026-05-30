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
        Schema::create('rat_outbreaks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('pathogen')->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->text('description');
            $table->timestamps();

            $table->index(['start_date', 'end_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rat_outbreaks');
    }
};
