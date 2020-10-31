<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScaleQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scale_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('scale_id');
            $table->foreign('scale_id')->references('id')->on('scales');
            $table->string('question');
            $table->text('description')->nullable();
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
        Schema::dropIfExists('scale_questions');
    }
}
