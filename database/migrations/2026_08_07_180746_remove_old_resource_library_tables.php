<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /*
    |--------------------------------------------------------------------------
    | Remove Old Resource Library Schema
    |--------------------------------------------------------------------------
    |
    | Removes the abandoned first implementation of the Resource Library
    | before the Dashboard V2 Resource Library architecture is introduced.
    |
    */

    public function up(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Relationship / Pivot Tables
        |--------------------------------------------------------------------------
        |
        | These must be removed before the parent tables they reference.
        |
        */

        Schema::dropIfExists('resource_resource_audience');
        Schema::dropIfExists('resource_resource_tag');
        Schema::dropIfExists('resource_trick');

        /*
        |--------------------------------------------------------------------------
        | Resources
        |--------------------------------------------------------------------------
        |
        | Resources references resource_categories, so it must be dropped
        | before resource_categories.
        |
        */

        Schema::dropIfExists('resources');

        /*
        |--------------------------------------------------------------------------
        | Supporting Tables
        |--------------------------------------------------------------------------
        */

        Schema::dropIfExists('resource_audiences');
        Schema::dropIfExists('resource_tags');
        Schema::dropIfExists('resource_categories');
    }

    public function down(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Intentionally Not Reversible
        |--------------------------------------------------------------------------
        |
        | This migration permanently removes an abandoned Resource Library
        | schema. The replacement Resource Library uses a different data
        | architecture and the legacy schema should not be restored.
        |
        */
    }
};