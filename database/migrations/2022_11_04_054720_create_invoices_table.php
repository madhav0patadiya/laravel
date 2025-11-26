<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->integer('invoice_id');
            $table->integer('client_id');
            $table->string('invoice_date');
            $table->string('amount');
            $table->string('dollar_rate');
            $table->double('invoice_amount', 9,2)->default(0);
            $table->double('ggst_amount', 9,2)->default(0);
            $table->double('sgst_amount', 9,2)->default(0);
            $table->double('igst_amount', 9,2)->default(0);
            $table->double('total_amount', 9,2)->default(0);
            $table->string('project');
            $table->longText('description');
            $table->text('reference');
            $table->tinyInteger('gst_applied')->comment('0=No, 1=Yes');
            $table->enum('isActive', ['0', '1'])->comment('0=Pending, 1=Paid')->default(0);
            $table->integer('createdBy');
            $table->integer('modifyBy');
            $table->timestamp('createdDate')->useCurrent();
            $table->timestamp('modifyDate')->useCurrent()->useCurrentOnUpdate();
            $timestamps = false;
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
