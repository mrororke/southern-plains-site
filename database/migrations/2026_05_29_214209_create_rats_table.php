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
        Schema::create('rats', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150); // Call Name
            $table->string('registered_name', 255)->nullable();
            $table->string('breeder_reference', 10)->nullable(); // ID Number from Breeder
            $table->enum('sex' , array('Male', 'Female'))->default('Male'); // Gender
            $table->date('dob')->nullable();
            $table->date('dod')->nullable();
            $table->enum('variety', array('Standard', 'Rex', 'Tailless', 'Hairless', 'Satin', 'Dumbo', 'Bristle Coat', 'Velveteen', 'Teddy Rex'))->default('Standard');
            $table->enum('color', array('Agouti', 'Beige', 'Black', 'Black Eyed Siamese', 'Black Eyed White', 'Black Marten', 'Blue', 'Blue Agouti', 'Blue-Beige', 'Burmese', 'Champagne', 'Chinchilla', 'Chocolate', 'Cinnamon', 'Cinnamon Pearl', 'Cocoa', 'Fawn', 'Himalayan', 'Lilac', 'Lynx', 'Merle', 'Mink', 'Pearl', 'P.E. Platinum', 'Platinum', 'Pink Eyed White', 'Powder Blue', 'Russian Blue', 'Russian Blue Agouti', 'Russian Blue Agouti Burmese', 'Russian Blue Point Siamese', 'Russian Dove', 'Seal point Siamese','Siamese', 'Silvermane', 'Sky Blue'))->default('Black');
            $table->enum('silvered', array('Amber', 'Silver Black', 'Silver Blue', 'Silver Chocolate', 'Silver Fawn', 'Silver Lilac', 'Silver Mink'))->nullable();
            $table->enum('markings', array('Bareback', 'Berkshire', 'Blaze', 'Capped', 'Dalmatian', 'Down Under', 'English Irish', 'Essex', 'Hooded', 'Irish', 'Masked', 'Self', 'Variegated'))->default('Self');
            $table->enum('eye_color', array('Black', 'Odd Eye', 'Pink', 'Ruby'))->default('Black');
            $table->enum('ear_set', array('Dumbo', 'Top'))->default('Dumbo');
            $table->foreignId('breeder_id')->nullable();
            $table->foreignId('sire_id')->nullable();
            $table->foreignId('dam_id')->nullable();
            $table->text('temperament')->nullable();
            $table->text('deformities')->nullable();
            $table->text('abnormalities')->nullable();
            $table->boolean('is_owned')->default(true);
            $table->boolean('is_pedigree_only')->default(false);
            $table->timestamps();

            $table->index('name');
            $table->index('registered_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rats');
    }
};
