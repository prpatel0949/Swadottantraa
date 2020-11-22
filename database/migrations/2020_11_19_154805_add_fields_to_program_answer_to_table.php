<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToProgramAnswerToTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('program_answers', function (Blueprint $table) {
            $table->integer('set_no')->unsigned()->default(0)->after('id');
            $table->bigInteger('user_id')->unsigned()->after('type');
            $table->boolean('is_read')->nullable()->default(false)->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('program_answers', function (Blueprint $table) {
            $table->dropColumn([ 'set_no', 'user_id', 'is_read' ]);
        });
    }
}
