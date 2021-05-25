<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTypeToScaleInterpreatationValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('scale_interpreatation_values', function (Blueprint $table) {
            $table->integer('min')->signed()->nullable()->default(0)->change();
            $table->integer('max')->signed()->nullable()->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('scale_interpreatation_values', function (Blueprint $table) {
            //
        });
    }
}
