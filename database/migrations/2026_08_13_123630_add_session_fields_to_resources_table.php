<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /*
    |--------------------------------------------------------------------------
    | Add Resource Session Fields
    |--------------------------------------------------------------------------
    */

    public function up(): void
    {
        Schema::table('resources', function (Blueprint $table) {

            $table
                ->unsignedSmallInteger('year')
                ->nullable()
                ->after('resource_series_id');

            $table
                ->string('session')
                ->nullable()
                ->after('year');

            $table
                ->unsignedTinyInteger('week_number')
                ->nullable()
                ->after('session');
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Remove Resource Session Fields
    |--------------------------------------------------------------------------
    */

    public function down(): void
    {
        Schema::table('resources', function (Blueprint $table) {

            $table->dropColumn([
                'year',
                'session',
                'week_number',
            ]);
        });
    }
};