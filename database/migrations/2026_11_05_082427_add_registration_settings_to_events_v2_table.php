
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('events_v2', function (Blueprint $table) {
            $table->string('registration_method', 24)
                ->nullable()
                ->after('registration_status');

            $table->unsignedInteger('working_capacity')
                ->nullable()
                ->after('registration_notes');

            $table->unsignedInteger('auditor_capacity')
                ->nullable()
                ->after('working_capacity');
        });
    }

    public function down(): void
    {
        Schema::table('events_v2', function (Blueprint $table) {
            $table->dropColumn([
                'registration_method',
                'working_capacity',
                'auditor_capacity',
            ]);
        });
    }
};
