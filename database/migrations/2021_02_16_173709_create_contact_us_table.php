<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_us', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('mobile');
            $table->integer('type')->unsigned()->nullable()->comment('0 -> Individual 1 -> Institue 2 -> Doctor');
            $table->text('message')->nullable();
            $table->integer('status')->unsigned()->nullable()->default(0)->comment('0 -> Pending, 1 -> In-Progress, 2 -> Completed');
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
        Schema::dropIfExists('contact_us');
    }
}
