<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStepScalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('step_scales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('step_id')->nullable();
            $table->foreign('step_id')->references('id')->on('program_stage_steps')->onDelete('cascade');
            $table->unsignedBigInteger('scale_id')->nullable();
            $table->foreign('scale_id')->references('id')->on('scales')->onDelete('cascade');
            $table->unsignedBigInteger('created_by')->nullable();
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
        Schema::dropIfExists('step_scales');
    }
}
