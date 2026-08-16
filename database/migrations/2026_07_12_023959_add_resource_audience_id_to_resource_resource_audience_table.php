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
        Schema::table('resource_resource_audience', function (Blueprint $table) {
            Schema::table('resource_resource_audience', function (Blueprint $table) {

        $table->foreignId('resource_audience_id')
            ->after('resource_id')
            ->constrained()
            ->cascadeOnDelete();

    });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('resource_resource_audience', function (Blueprint $table) {
            Schema::table('resource_resource_audience', function (Blueprint $table) {

        $table->dropForeign(['resource_audience_id']);
        $table->dropColumn('resource_audience_id');

    });
        });
    }
};
