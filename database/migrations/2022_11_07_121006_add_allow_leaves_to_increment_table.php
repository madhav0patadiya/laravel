<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAllowLeavesToIncrementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('increment', function (Blueprint $table) {
            $table->integer('allow_leaves')->after('effective_date');
            $table->integer('total_used_leave')->after('allow_leaves')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('increment', function (Blueprint $table) {
            //
        });
    }
}
