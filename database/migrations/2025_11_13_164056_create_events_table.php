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
        Schema::create('events', function (Blueprint $table) {
            $table->id();

            // Core Scheduling Fields
            $table->date('date'); // Date of event

            // Event Details
            $table->string('name', 150); // Name of event
            $table->text('about')->nullable(); // Text block for description
            $table->string('location')->nullable(); // Venue or address

            // Categorization & URLs
            // 1=club, 2=league, 3=training, 4=other
            $table->unsignedTinyInteger('category_id')->default(4); 
            $table->string('event_link')->nullable(); // Link (e.g., registration page)
            $table->string('host_link')->nullable(); // Link to host (if not Southern Plains)
            $table->string('slug')->unique(); // For clean URLs (e.g., /events/april-training)

            // Management & Status
            $table->boolean('is_published')->default(false); // For draft/published status
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
