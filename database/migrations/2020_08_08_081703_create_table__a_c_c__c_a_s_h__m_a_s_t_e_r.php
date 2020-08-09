<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableACCCASHMASTER extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cash_master', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->datetime('cash_date')->nullable();
            $table->tinyInteger('approved')->nullable();
            $table->integer('exit_permission_code')->nullable();
            $table->string('statement',4000)->nullable();
            $table->string('person_name',150)->nullable();
            $table->tinyInteger('fund_source')->nullable();
            $table->decimal('cash_amount',12,2)->nullable();
            $table->integer('cash_receipt_note')->nullable();
            $table->decimal('comm_industr_prof_tax', 12, 2)->nullable();
            $table->decimal('vat_value',12,2)->nullable();
            $table->decimal('net_value',12,2)->nullable();
            $table->string('detailed_criterion',150)->nullable();
            $table->tinyInteger('confirm')->nullable();
            $table->string('notes',300)->nullable();

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
        Schema::dropIfExists('cash_master');
    }
}
