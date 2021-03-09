<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScaleInterpreatationQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scale_interpreatation_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('scale_interpreatation_id')->nullable();
            $table->foreign('scale_interpreatation_id')->references('id')->on('scale_interpreatations')->onDelete('cascade');
            $table->unsignedBigInteger('question_id')->nullable();
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
        Schema::dropIfExists('scale_interpreatation_questions');
    }
}
