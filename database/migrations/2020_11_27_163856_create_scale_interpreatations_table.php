<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScaleInterpreatationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scale_interpreatations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('scale_id')->nullable();
            $table->foreign('scale_id')->references('id')->on('scales')->onDelete('cascade');
            $table->integer('start')->unsigned();
            $table->integer('end')->unsigned();
            $table->string('value')->nullable();
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
        Schema::dropIfExists('scale_interpreatations');
    }
}
