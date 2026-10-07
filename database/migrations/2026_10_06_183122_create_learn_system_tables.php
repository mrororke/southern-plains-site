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
        | Learn Categories
        |--------------------------------------------------------------------------
        */

        Schema::create('learn_categories', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();

            $table->timestamps();
        });

        /*
        |--------------------------------------------------------------------------
        | Learn Tags
        |--------------------------------------------------------------------------
        */

        Schema::create('learn_tags', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug')->unique();

            $table->timestamps();
        });

        /*
        |--------------------------------------------------------------------------
        | Learn Articles
        |--------------------------------------------------------------------------
        */

        Schema::create('learn_articles', function (Blueprint $table) {
            $table->id();

            // standard | guide | book_review
            $table->string('type', 32)->default('standard');

            // draft | published | archived
            $table->string('status', 24)->default('draft');

            $table->string('title');
            $table->string('slug')->unique();

            $table->text('excerpt')->nullable();
            $table->longText('body');

            /*
             * Guides can display when their information was last reviewed.
             * This remains nullable for other article types.
             */
            $table->date('last_reviewed_at')->nullable();

            /*
             * Affiliate disclosure.
             */
            $table->boolean('has_affiliate_links')->default(false);

            /*
             * Standard articles and guides may be featured.
             * Book reviews will be prevented from being featured
             * at the application level.
             *
             * Featured articles are ordered by published_at,
             * newest first. No manual featured ordering.
             */
            $table->boolean('is_featured')->default(false);

            /*
             * SEO
             */
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();

            /*
             * Publishing
             *
             * A published article with a future published_at value
             * is treated as scheduled.
             */
            $table->timestamp('published_at')->nullable();

            $table->timestamps();

            $table->index(['status', 'published_at']);
            $table->index(['is_featured', 'published_at']);
            $table->index('type');
        });

        /*
        |--------------------------------------------------------------------------
        | Article Images
        |--------------------------------------------------------------------------
        |
        | Standard articles and guides may contain multiple sidebar images.
        |
        | display_type:
        |   image  = standard image with optional caption
        |   figure = automatically numbered figure with optional caption
        |
        | Figure numbers are NOT stored. They are calculated from the ordered
        | figure collection when the article is rendered.
        |
        */

        Schema::create('learn_article_images', function (Blueprint $table) {
            $table->id();

            $table->foreignId('article_id')
                ->constrained('learn_articles')
                ->cascadeOnDelete();

            $table->string('image_path');
            $table->string('alt_text');
            $table->text('caption')->nullable();

            // image | figure
            $table->string('display_type', 24)->default('image');

            $table->unsignedInteger('sort_order')->default(0);

            $table->timestamps();

            $table->index(['article_id', 'sort_order']);
        });

        /*
        |--------------------------------------------------------------------------
        | Article Categories
        |--------------------------------------------------------------------------
        */

        Schema::create('learn_article_category', function (Blueprint $table) {
            $table->foreignId('article_id')
                ->constrained('learn_articles')
                ->cascadeOnDelete();

            $table->foreignId('category_id')
                ->constrained('learn_categories')
                ->cascadeOnDelete();

            $table->timestamps();

            $table->primary(['article_id', 'category_id']);
        });

        /*
        |--------------------------------------------------------------------------
        | Article Tags
        |--------------------------------------------------------------------------
        */

        Schema::create('learn_article_tag', function (Blueprint $table) {
            $table->foreignId('article_id')
                ->constrained('learn_articles')
                ->cascadeOnDelete();

            $table->foreignId('tag_id')
                ->constrained('learn_tags')
                ->cascadeOnDelete();

            $table->timestamps();

            $table->primary(['article_id', 'tag_id']);
        });

        /*
        |--------------------------------------------------------------------------
        | Book Reviews
        |--------------------------------------------------------------------------
        |
        | Book reviews intentionally contain only the metadata required by
        | the public review design. The cover serves as the review's image.
        |
        */

        Schema::create('learn_book_reviews', function (Blueprint $table) {
            $table->id();

            $table->foreignId('article_id')
                ->unique()
                ->constrained('learn_articles')
                ->cascadeOnDelete();

            $table->string('book_title');
            $table->string('book_author');

            /*
             * Five-point rating with half-star support.
             * Examples: 3.5, 4.0, 4.5, 5.0
             */
            $table->decimal('rating', 2, 1)->nullable();

            $table->string('cover_image_path');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('learn_book_reviews');
        Schema::dropIfExists('learn_article_tag');
        Schema::dropIfExists('learn_article_category');
        Schema::dropIfExists('learn_article_images');
        Schema::dropIfExists('learn_articles');
        Schema::dropIfExists('learn_tags');
        Schema::dropIfExists('learn_categories');
    }
};