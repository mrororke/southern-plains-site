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
        Schema::create('tricks', function (Blueprint $table) {
            $table->id();

            $table->string('name');

            $table->enum('level', [
                'novice', 'intermediate', 'advanced', 'performer', 'performer_elite'
            ]);

            $table->text('notes')->nullable();

            $table->foreignId('created_by')->constrained('users')->cascadeOnDelete();
            $table->foreignId('update_by')->nullable()->constrained('users')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tricks');
    }
};
