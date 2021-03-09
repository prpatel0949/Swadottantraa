<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientMoodMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_mood_marks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->decimal('marks', 10, 2)->default(0.00);
            $table->decimal('lower_marks', 10, 2)->default(0.00);
            $table->unsignedBigInteger('mood_id')->nullable();
            $table->foreign('mood_id')->references('id')->on('moods')->onDelete('cascade');
            $table->unsignedBigInteger('lower_mood_id')->nullable();
            $table->foreign('lower_mood_id')->references('id')->on('moods')->onDelete('cascade');
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
        Schema::dropIfExists('client_mood_marks');
    }
}
