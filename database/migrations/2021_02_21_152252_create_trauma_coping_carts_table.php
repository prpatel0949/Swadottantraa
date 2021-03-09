<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTraumaCopingCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trauma_coping_carts', function (Blueprint $table) {
            $table->id();
            $table->boolean('lflag')->nullable()->default(false);
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->text('title')->nullable();
            $table->unsignedBigInteger('trauma_id')->nullable();
            $table->foreign('trauma_id')->references('id')->on('traumas')->onDelete('cascade');
            $table->boolean('is_active')->nullable()->default(false);
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
        Schema::dropIfExists('trauma_coping_carts');
    }
}
