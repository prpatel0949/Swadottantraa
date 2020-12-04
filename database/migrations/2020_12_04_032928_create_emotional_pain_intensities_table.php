<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmotionalPainIntensitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emotional_pain_intensities', function (Blueprint $table) {
            $table->id();
            $table->string('emotional_pain_intensity')->nullable();
            $table->string('emotional_pain_intensity_marathi')->nullable();
            $table->integer('emotional_pain_intensity_no')->unsigned()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emotional_pain_intensities');
    }
}
