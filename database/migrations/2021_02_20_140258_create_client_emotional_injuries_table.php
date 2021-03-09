<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientEmotionalInjuriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_emotional_injuries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->unsignedBigInteger('emotional_injury_id')->nullable();
            $table->foreign('emotional_injury_id')->references('id')->on('emotional_injuries')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('client_transaction_id')->nullable();
            $table->foreign('client_transaction_id')->references('id')->on('client_transactions')->onDelete('cascade');
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
        Schema::dropIfExists('client_emotional_injuries');
    }
}
