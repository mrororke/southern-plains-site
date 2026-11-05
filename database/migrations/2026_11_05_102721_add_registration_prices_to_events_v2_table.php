<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('events_v2', function (Blueprint $table) {
            /*
             * Registration Pricing
             *
             * Working price is per dog.
             * Auditor price is per participant.
             *
             * Null indicates pricing has not been specified.
             * Zero indicates a free registration.
             */
            $table->decimal('working_price', 10, 2)
                ->nullable()
                ->after('auditor_capacity');

            $table->decimal('auditor_price', 10, 2)
                ->nullable()
                ->after('working_price');
        });
    }

    public function down(): void
    {
        Schema::table('events_v2', function (Blueprint $table) {
            $table->dropColumn([
                'working_price',
                'auditor_price',
            ]);
        });
    }
};