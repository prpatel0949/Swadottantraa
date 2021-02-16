<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScaleInterpreatationValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scale_interpreatation_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('scale_interpreatation_id')->nullable();
            $table->foreign('scale_interpreatation_id')->references('id')->on('scale_interpreatations')->onDelete('cascade');
            $table->integer('min')->unsigned()->nullable();
            $table->integer('max')->unsigned()->nullable();
            $table->text('interpretation')->nullable();
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
        Schema::dropIfExists('scale_interpreatation_values');
    }
}
