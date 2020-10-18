<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkoutQuestionAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workout_question_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('workout_question_id');
            $table->foreign('workout_question_id')->references('id')->on('workout_questions');
            $table->text('answer');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->integer('order')->default(0)->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('workout_question_answers');
    }
}
