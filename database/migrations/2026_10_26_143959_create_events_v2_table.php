<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Events V2
        |--------------------------------------------------------------------------
        */

        Schema::create('events_v2', function (Blueprint $table) {
            $table->id();

            /*
             * Event Type
             *
             * dog_sports | training | workshop | class | community | other
             */
            $table->string('type', 32);

            /*
             * Publication Status
             *
             * draft | published | cancelled
             */
            $table->string('status', 24)->default('draft');

            $table->string('title');
            $table->string('slug')->unique();

            $table->text('short_description')->nullable();
            $table->longText('description');

            /*
             * Featured Image
             *
             * The featured image is also used as the default OG image.
             */
            $table->string('featured_image_path')->nullable();
            $table->string('featured_image_alt')->nullable();

            /*
             * Date & Time
             *
             * Event times use the site's configured timezone.
             *
             * A null end date indicates a single-day event.
             */
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();

            /*
             * Location
             */
            $table->string('venue_name')->nullable();
            $table->string('address')->nullable();
            $table->string('city');
            $table->string('state');

            /*
             * Private locations retain the address internally
             * but do not expose it on the public site.
             */
            $table->boolean('is_private_location')->default(false);
            $table->text('location_details')->nullable();

            /*
             * Registration
             *
             * not_required | open | coming_soon | closed
             */
            $table->string('registration_status', 24)
                ->default('not_required');

            $table->string('registration_url')->nullable();
            $table->date('registration_deadline')->nullable();
            $table->text('registration_notes')->nullable();

            /*
             * Event Details
             */
            $table->longText('what_to_expect')->nullable();
            $table->longText('what_to_bring')->nullable();
            $table->longText('requirements_notes')->nullable();

            /*
             * Primary CTA
             */
            $table->string('cta_label')->nullable();
            $table->string('cta_url')->nullable();

            /*
             * SEO
             */
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();

            /*
             * Publishing
             *
             * A published event is publicly available when its
             * published_at value is in the past or present.
             */
            $table->timestamp('published_at')->nullable();

            $table->timestamps();

            /*
             * Indexes
             *
             * Status + start date supports upcoming/past event queries.
             * Status + published date supports publication queries.
             */
            $table->index(['status', 'start_date']);
            $table->index(['status', 'published_at']);
            $table->index('type');
            $table->index('registration_status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events_v2');
    }
};