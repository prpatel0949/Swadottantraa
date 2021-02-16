<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSetNoToScaleInterpreatationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('scale_interpreatations', function (Blueprint $table) {
            $table->integer('set_no')->unsigned()->nullable()->after('id');
            $table->integer('question_id')->unsigned()->nullable()->after('set_no');

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
            $table->dropColumn([ 'question_id', 'set_no' ]);
        });
    }
}
