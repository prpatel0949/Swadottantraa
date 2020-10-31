<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkoutQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workout_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('workout_id');
            $table->foreign('workout_id')->references('id')->on('workouts');
            $table->string('question');
            $table->text('description')->nullable();
            $table->text('answer')->nullable();
            $table->integer('answer_type')->unsigned();
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
        Schema::dropIfExists('workout_questions');
    }
}
