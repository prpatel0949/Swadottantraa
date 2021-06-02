<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTitleToScaleInterpreatationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('scale_interpreatations', function (Blueprint $table) {
            $table->text('title')->nullable()->after('set_no');
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
            $table->dropColumn('title');
        });
    }
}
