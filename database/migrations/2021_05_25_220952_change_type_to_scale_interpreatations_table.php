<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTypeToScaleInterpreatationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('scale_interpreatations', function (Blueprint $table) {
            $table->integer('start')->signed()->nullable()->default(0)->change();
            $table->integer('end')->signed()->nullable()->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('scale_interpreatations', function (Blueprint $table) {
            //
        });
    }
}
