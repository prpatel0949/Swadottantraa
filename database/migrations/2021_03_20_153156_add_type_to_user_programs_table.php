<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeToUserProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_programs', function (Blueprint $table) {
            $table->integer('type')->unsigned()->comment('0 -> individual, 1 -> Franchisee 2 -> institue');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_programs', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
}
