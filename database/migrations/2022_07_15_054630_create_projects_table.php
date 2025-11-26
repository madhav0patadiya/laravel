<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->Bigincrements('id');
            $table->string('project_title');
            $table->tinyInteger('priority')->comment('0=low, 1=medium, 2=high');
            $table->date('start_date');
            $table->tinyInteger('work_status')->comment('0=pending, 1=active, 2=completed');
            $table->string('note');
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
        Schema::dropIfExists('projects');
    }
}
