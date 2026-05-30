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
        Schema::create('rat_health_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rat_id')->constrained('rats')->cascadeOnDelete();
            $table->string('diagnosis');
            $table->text('symptoms')->nullable();
            $table->date('onset_date')->nullable();
            $table->date('resolved_date')->nullable();
            $table->string('outcome')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rat_health_records');
    }
};
