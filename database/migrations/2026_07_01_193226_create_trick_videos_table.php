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
        Schema::create('trick_videos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('trick_id')->constrained()->cascadeOnDelete();

            $table->string('url');

            $table->enum('platform', [
                'instagram',
                'facebook',
                'tiktok',
                'youtube'
            ]);

            $table->string('creator')->nullable();
            $table->boolean('is_preferred')->default(false);

            $table->text('notes')->nullable();

            $table->foreignId('created_by')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('updated_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trick_videos');
    }
};
