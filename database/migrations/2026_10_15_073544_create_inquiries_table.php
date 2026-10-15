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
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();

            // Inquiry information
            $table->string('type');
            $table->string('name');
            $table->string('email');
            $table->string('subject')->nullable();
            $table->text('message')->nullable();

            // Additional information specific to each form
            $table->json('details')->nullable();

            // Inbox management
            $table->timestamp('read_at')->nullable();
            $table->timestamp('resolved_at')->nullable();
            $table->timestamp('archived_at')->nullable();

            $table->timestamps();

            // Improve inbox filtering
            $table->index('type');
            $table->index('archived_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiries');
    }
};