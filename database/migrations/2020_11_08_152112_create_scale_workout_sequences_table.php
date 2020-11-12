<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScaleWorkoutSequencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scale_workout_sequences', function (Blueprint $table) {
            $table->id();
            $table->morphs('typable');
            $table->integer('sequence')->unsigned();
            $table->unsignedBigInteger('step_id')->nullable();
            $table->foreign('step_id')->references('id')->on('program_stage_steps')->onDelete('cascade');
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
        Schema::dropIfExists('scale_workout_sequences');
    }
}
