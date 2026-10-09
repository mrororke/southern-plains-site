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
        Schema::create('learn_article_related', function (Blueprint $table) {
            $table->id();

            $table->foreignId('article_id')
                ->constrained('learn_articles')
                ->cascadeOnDelete();

            $table->foreignId('related_article_id')
                ->constrained('learn_articles')
                ->cascadeOnDelete();

            $table->timestamps();

            $table->unique(
                ['article_id', 'related_article_id'],
                'learn_article_related_unique'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('learn_article_related');
    }
};