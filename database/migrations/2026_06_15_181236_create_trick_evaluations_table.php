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
        Schema::create('trick_evaluations', function (Blueprint $table) {
            $table->id();
            
            // Owner
            $table->string('owner_name');
            $table->string('email');

            // Dog
            $table->string('dog_name');
            $table->string('dog_number')->nullable();
            $table->string('trick_level');

            // Method
            $table->string('eval_method');
            $table->string('video_link')->nullable();
            $table->dateTime('scheduled_datetime')->nullable();

            // Multi Dog Payload
            $table->json('additional_dogs')->nullable();

            // Payment Snapshot
            $table->string('payment_method')->nullable();
            $table->decimal('total_fee', 8,2)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trick_evaluations');
    }
};
