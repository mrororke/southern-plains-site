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
        Schema::create('rat_temperament_assessments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rat_id')->constrained('rats')->cascadeOnDelete();
            $table->date('date');
            // The folllowing personality trait words taken from survey of study found at https://pmc.ncbi.nlm.nih.gov/articles/PMC7616731/ options are: 6 = strongly agree, 5 = agree, 4=more or less agree, 3=more or less disagree, 2=disagree, 1=strongly disagree, 0= does not apply
            $table->tinyInteger('agg_people')->nullable(); //Aggressive towards people
            $table->tinyInteger('agg_rats')->nullable(); //Aggressive towards rats
            $table->tinyInteger('agile')->nullable(); //Agile
            $table->tinyInteger('anxious')->nullable(); //Anxious
            $table->tinyInteger('attentive')->nullable(); //Attentive
            $table->tinyInteger('bold')->nullable(); //Bold
            $table->tinyInteger('careless')->nullable(); //Careless
            $table->tinyInteger('cautious')->nullable(); //Cautious
            $table->tinyInteger('communicative')->nullable(); //Communicative
            $table->tinyInteger('confident')->nullable(); //Confident
            $table->tinyInteger('creative')->nullable(); //Creative
            $table->tinyInteger('curious')->nullable(); //Curious
            $table->tinyInteger('determined')->nullable(); //Determined
            $table->tinyInteger('devious')->nullable(); //Devious
            $table->tinyInteger('docile')->nullable(); //Docile
            $table->tinyInteger('dominant')->nullable(); //Dominant
            $table->tinyInteger('easy_going')->nullable(); //Easy Going
            $table->tinyInteger('easy_to_handle')->nullable(); //Easy to Handle
            $table->tinyInteger('enthusiastic')->nullable(); //enthusiastic
            $table->tinyInteger('equable_people')->nullable(); //Equable with People
            $table->tinyInteger('equable_rats')->nullable(); //equable with rats
            $table->tinyInteger('fearful_people')->nullable(); //fearful of people
            $table->tinyInteger('fearful_rats')->nullable(); //fearful of rats
            $table->tinyInteger('food_motivated')->nullable(); //food motivated
            $table->tinyInteger('friendly')->nullable(); //friendly
            $table->tinyInteger('generous')->nullable(); //generous
            $table->tinyInteger('happy')->nullable(); //happy
            $table->tinyInteger('helpful')->nullable(); //helpful
            $table->tinyInteger('hyperactive')->nullable(); //hyperactive
            $table->tinyInteger('impulsive')->nullable(); //impulsive
            $table->tinyInteger('indecisive')->nullable(); //indecisive
            $table->tinyInteger('independent')->nullable(); //independent
            $table->tinyInteger('intelligent')->nullable(); //intelligent
            $table->tinyInteger('interested')->nullable(); //interested
            $table->tinyInteger('irritable')->nullable(); //irritable
            $table->tinyInteger('jealous')->nullable(); //jealous
            $table->tinyInteger('lethargic')->nullable(); //lethargic
            $table->tinyInteger('lively')->nullable(); //lively
            $table->tinyInteger('obedient')->nullable(); //obedient
            $table->tinyInteger('opportunistic')->nullable(); //opportunistic
            $table->tinyInteger('patient')->nullable(); //patient
            $table->tinyInteger('playful_people')->nullable(); //playful with people
            $table->tinyInteger('playful_rats')->nullable(); //playful with rats
            $table->tinyInteger('predictable')->nullable(); //predictable
            $table->tinyInteger('protective')->nullable(); //protective
            $table->tinyInteger('proud')->nullable(); //proud
            $table->tinyInteger('rebellious')->nullable(); //rebellious
            $table->tinyInteger('selfish')->nullable(); //selfish
            $table->tinyInteger('shy')->nullable(); //shy
            $table->tinyInteger('sociable_people')->nullable(); //sociable with people
            $table->tinyInteger('sociable_rats')->nullable(); //sociable with rats
            $table->tinyInteger('solitary')->nullable(); //solitary
            $table->tinyInteger('stubborn')->nullable(); //stubborn
            $table->tinyInteger('suspicious')->nullable(); //suspicious
            $table->tinyInteger('systematic')->nullable(); //systematic
            $table->tinyInteger('tame')->nullable(); //tame
            $table->tinyInteger('temperamental')->nullable(); //temperamental
            $table->tinyInteger('trainable')->nullable(); //trainable
            $table->tinyInteger('trusting')->nullable(); //trusting
            $table->tinyInteger('unemotional')->nullable(); //unemotional
            $table->tinyInteger('vocal')->nullable(); //vocal


            $table->timestamps();

            $table->index(['rat_id', 'date']);
            $table->unique(['rat_id', 'date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rat_temperament_assessments');
    }
};
