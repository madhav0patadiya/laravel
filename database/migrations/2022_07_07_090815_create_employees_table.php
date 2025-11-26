<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->Bigincrements('id');
            $table->string('firstname')->nullable();
            $table->string('fathername')->nullable();
            $table->string('lastname')->nullable();
            $table->string('gender')->nullable();
            $table->string('phone')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('designation')->nullable();
            $table->string('current_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('avatar')->nullable();
            $table->longText('hobby')->nullable();
            $table->string('education')->nullable();
            $table->integer('allow_leaves')->nullable();
            $table->string('email');
            $table->string('password');
            $table->string('reference_from')->nullable();
            $table->string('other_person_name')->nullable();
            $table->string('other_person_number')->nullable();
            $table->tinyInteger('allow_login')->comment('0=invalid_user, 1=valid user');
            $table->tinyInteger('role')->default(1)->comment('1 = Employee, 2 = Hr, 3 = Team leader, 4 = Project Manager');
            $table->tinyInteger('onboarding_complete')->default(0)->comment('0 = Pending, 1 = Completed');
            $table->string('remember_token')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
