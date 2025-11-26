<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->Biginteger('employee_id')->unsigned();
            $table->date('from');
            $table->date('to');
            $table->Biginteger('type')->unsigned();
            $table->tinyInteger('status')->comment('0=pending, 1=approve, 2=reject')->default(0);
            $table->text('reason');
            $table->timestamps();
            // $table->foreign('type')->references('id')->on('leave_types')->onDelete('cascade');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leaves');
    }
}
