<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleToPersonalNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personal_notes', function (Blueprint $table) {
            $table->tinyInteger('role')->after('employee_id')->comment('1 = Admin, 2 = All Employee');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personal_notes', function (Blueprint $table) {
            //
        });
    }
}
