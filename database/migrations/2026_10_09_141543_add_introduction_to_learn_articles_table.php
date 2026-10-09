<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('learn_articles', function (Blueprint $table) {
            $table->longText('introduction')
                ->nullable()
                ->after('excerpt');
        });
    }

    public function down(): void
    {
        Schema::table('learn_articles', function (Blueprint $table) {
            $table->dropColumn('introduction');
        });
    }
};