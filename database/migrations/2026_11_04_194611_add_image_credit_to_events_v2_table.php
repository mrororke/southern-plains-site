<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('events_v2', function (Blueprint $table) {
            $table->string('featured_image_credit')->nullable()->after('featured_image_alt');
            $table->string('featured_image_credit_url')->nullable()->after('featured_image_credit');
        });
    }

    public function down(): void
    {
        Schema::table('events_v2', function (Blueprint $table) {
            $table->dropColumn([
                'featured_image_credit',
                'featured_image_credit_url',
            ]);
        });
    }
};