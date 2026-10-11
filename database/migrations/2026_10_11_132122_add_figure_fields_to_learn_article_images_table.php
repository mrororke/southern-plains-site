<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('learn_article_images', function (Blueprint $table) {
            $table->string('figure_title')->nullable();
            $table->text('figure_description')->nullable();
            $table->string('photographer_name')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('learn_article_images', function (Blueprint $table) {
            $table->dropColumn([
                'figure_title',
                'figure_description',
                'photographer_name',
            ]);
        });
    }
};