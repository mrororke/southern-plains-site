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
        Schema::create('resources', function (Blueprint $table) {
            $table->id();

            $table->string('internal_title');
            $table->string('email_subject');
            $table->string('slug')->unique();

            $table->text('summary')->nullable();
            $table->longText('body')->nullable();

            $table->foreignId('resource_category_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->enum('status', [
                'draft', 'published', 'archived',
            ])->default('draft');
            $table->boolean('is_template')->default(false);

            $table->foreignId('author_id')->constrained('users')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('updated_by')->constrained('users')->cascadeOnUpdate()->restrictOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resources');
    }
};
