<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubEmotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_emotions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('emotion_id');
            $table->foreign('emotion_id')->references('id')->on('emotions')->onDelete('cascade');
            $table->string('sub_emotions', 100)->nullable();
            $table->string('sub_emotions_marathi', 100)->nullable();
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
        Schema::dropIfExists('sub_emotions');
    }
}
