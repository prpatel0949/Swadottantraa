<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramStageStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_stage_steps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('program_stage_id')->nullable();
            $table->foreign('program_stage_id')->references('id')->on('program_stages')->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('order')->unsigned()->nullable()->default(0);
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
        Schema::dropIfExists('program_stage_steps');
    }
}
