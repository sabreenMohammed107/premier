<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableACCFINANTRANSACTIONS extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('FINAN_TRANSACTIONS', function (Blueprint $table) {
            $table->bigIncrements('TRANSACTION_ID');
            // $table->unsignedBigInteger('TRANSACTION_TYPE_ID')->nullable();    
            // $table->foreign('TRANSACTION_TYPE_ID')->references('TRANSACTION_TYPE_ID')->on('FINAN_TRANSACTIONS_TYPES');
            $table->datetime('TRANSACTION_DATE')->nullable();
            $table->integer('PERMISSION_CODE')->nullable();
            $table->integer('INVOICE_NO')->nullable();
            // $table->unsignedBigInteger('PERSON_ID')->nullable();    
            // $table->foreign('PERSON_ID')->references('PERSON_ID')->on('PERSONS');
            $table->string('PERSON_NAME',150)->nullable();
            // $table->unsignedBigInteger('PERSON_TYPE_ID')->nullable();    
            // $table->foreign('PERSON_TYPE_ID')->references('PERSON_TYPE_ID')->on('PERSON_TYPES');
            // $table->unsignedBigInteger('SAFE_ID')->nullable();    
            // $table->foreign('SAFE_ID')->references('SAFE_ID')->on('SAFE');
            // $table->unsignedBigInteger('BANK_ID')->nullable();    
            // $table->foreign('BANK_ID')->references('BANK_ID')->on('BANKS');
            // $table->unsignedBigInteger('CHEQUE_ID')->nullable();    
            // $table->foreign('CHEQUE_ID')->references('CHEQUE_ID')->on('CHEQUES');
            $table->decimal('ADDITIVE',12,2)->nullable();
            $table->decimal('SUBTRACTIVE',12,2)->nullable();
            $table->string('NOTES',4000)->nullable();
            $table->string('PURCH_SALES_STATEMENT',4000)->nullable();
            // $table->unsignedBigInteger('CASH_ID')->nullable();    
            // $table->foreign('CASH_ID')->references('CASH_ID')->on('CASH_MASTER');
            // $table->unsignedBigInteger('INV_ID')->nullable();    
            // $table->foreign('INV_ID')->references('INV_ID')->on('INVOICES');
            // $table->unsignedBigInteger('ITEM_ID')->nullable();    
            // $table->foreign('ITEM_ID')->references('ITEM_ID')->on('ITEMS');
            // $table->unsignedBigInteger('INV_ITEM_ID')->nullable();    
            // $table->foreign('INV_ITEM_ID')->references('id')->on('INVOICES_ITEMS');
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
        Schema::dropIfExists('FINAN_TRANSACTIONS');
    }
}
