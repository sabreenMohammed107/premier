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
        Schema::create('CASH_MASTER', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->datetime('CASH_DATE')->nullable();
            $table->tinyInteger('APPROVED')->nullable();
            $table->integer('EXIT_PERMISSION_CODE')->nullable();
            $table->string('STATEMENT',4000)->nullable();
            // $table->unsignedBigInteger('PERSON_ID')->nullable();    
            // $table->foreign('PERSON_ID')->references('PERSON_ID')->on('PERSONS');
            $table->string('PERSON_NAME',150)->nullable();
            // $table->unsignedBigInteger('COMPANY_ID')->nullable();    
            // $table->foreign('COMPANY_ID')->references('COMPANY_ID')->on('COMPANY');
            $table->tinyInteger('FUND_SOURCE')->nullable();
            $table->decimal('CASH_AMOUNT',12,2)->nullable();
            // $table->unsignedBigInteger('OUTGOING_TYPE_ID')->nullable();    
            // $table->foreign('OUTGOING_TYPE_ID')->references('OUTGOING_TYPE_ID')->on('OUTGOING_TYPES');
            // $table->unsignedBigInteger('PURCHASING_TYPE_ID')->nullable();    
            // $table->foreign('PURCHASING_TYPE_ID')->references('PURCHASING_TYPE_ID')->on('PURCHASING_TYPES');
            // $table->unsignedBigInteger('SERVICE_TYPE_ID')->nullable();    
            // $table->foreign('SERVICE_TYPE_ID')->references('SERVICE_TYPE_ID')->on('SERVICES_TYPES');
            $table->integer('CASH_RECEIPT_NOTE')->nullable();
            $table->decimal('COMM_INDUSTR_PROF_TAX', 12, 2)->nullable();
            $table->decimal('VAT_VALUE',12,2)->nullable();
            $table->decimal('NET_VALUE',12,2)->nullable();
            // $table->unsignedBigInteger('GUIDED_ITEM_ID')->nullable();    
            // $table->foreign('GUIDED_ITEM_ID')->references('GUIDED_ITEM_ID')->on('GUIDED_ITEMS');
            $table->string('DETAILED_CRITERION',150)->nullable();
            $table->tinyInteger('CONFIRM')->nullable();
            $table->string('NOTES',300)->nullable();

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
        Schema::dropIfExists('CASH_MASTER');
    }
}
