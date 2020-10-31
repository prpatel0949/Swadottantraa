<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('profile')->nullable()->after('type');
            $table->boolean('gender')->nullable()->default(false);
            $table->string('code')->nullable();
            $table->string('education')->nullable();
            $table->string('occupation')->nullable();
            $table->text('address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([ 'profile', 'gender', 'code', 'education', 'occupation', 'address' ]);
        });
    }
}
