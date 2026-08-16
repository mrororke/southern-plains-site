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
        Schema::table('trick_videos', function (Blueprint $table) {
            $table->unique(['trick_id', 'url']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trick_videos', function (Blueprint $table) {
            $table->dropUnique(['trick_videos_trick_id_url_uinque']);
        });
    }
};
