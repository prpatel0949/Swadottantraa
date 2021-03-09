<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScaleTipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scale_tips', function (Blueprint $table) {
            $table->id();
            $table->text('description')->nullable();
            $table->integer('min_value')->unsigned()->nullable()->default(0);
            $table->integer('max_value')->unsigned()->nullable()->default(0);
            $table->string('title')->nullable();
            $table->boolean('lflag')->nullable()->default(false);
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
        Schema::dropIfExists('scale_tips');
    }
}
