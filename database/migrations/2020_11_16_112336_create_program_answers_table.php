<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('program_id')->nullable();
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
            $table->unsignedBigInteger('step_id')->nullable();
            $table->foreign('step_id')->references('id')->on('program_stage_steps')->onDelete('cascade');
            $table->unsignedBigInteger('scale_question_id')->nullable();
            $table->foreign('scale_question_id')->references('id')->on('scale_questions')->onDelete('cascade');
            $table->unsignedBigInteger('workout_question_id')->nullable();
            $table->foreign('workout_question_id')->references('id')->on('workout_questions')->onDelete('cascade');
            $table->unsignedBigInteger('scale_question_answer_id')->nullable();
            $table->foreign('scale_question_answer_id')->references('id')->on('scale_question_answers')->onDelete('cascade');
            $table->unsignedBigInteger('workout_question_answer_id')->nullable();
            $table->foreign('workout_question_answer_id')->references('id')->on('workout_question_answers')->onDelete('cascade');
            $table->text('answer')->nullable();
            $table->integer('type')->unsigned()->nullable()->comment('0 => MCQ 1 => Descriptive')->default(0);
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
        Schema::dropIfExists('program_answers');
    }
}
