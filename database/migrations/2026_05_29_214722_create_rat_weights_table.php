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
        Schema::create('rat_weights', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rat_id')->constrained('rats')->cascadeOnDelete();
            $table->decimal('weight', 6,2);
            $table->date('recorded_at');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rat_weights');
    }
};
