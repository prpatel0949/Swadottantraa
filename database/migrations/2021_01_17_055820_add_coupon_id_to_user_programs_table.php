<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCouponIdToUserProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_programs', function (Blueprint $table) {
            $table->bigInteger('coupon_id')->nullable()->unsigned();
            $table->decimal('program_amount', 10, 2)->nullable()->default(0.00);
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
            $table->dropColumn([ 'coupon_id', 'program_amount' ]);
        });
    }
}
