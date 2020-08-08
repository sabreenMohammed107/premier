<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableACCINVOICEITEMS extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('INVOICE_ITEMS', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('STORE_ITEM')->nullable(); // the datatype needs to be revised 
            // $table->unsignedBigInteger('ITEM_ID')->nullable(); 
            // $table->foreign('ITEM_ID')->references('ITEM_ID')->on('ITEMS'); 
            $table->string('ITEM_TEXT',150)->nullable();
            $table->decimal('ITEM_PRICE',12,2)->nullable();
            $table->integer('ITEM_QUANTITY')->nullable();
            $table->decimal('TOTAL_ITEM_PRICE',12,2)->nullable();
            $table->decimal('ITEM_DISCOUNT',12,2)->nullable();
            $table->decimal('TOTAL_AFTER_DISCOUNTS',12,2)->nullable();
            $table->tinyInteger('TAX_EXEMPTION')->nullable();
            $table->decimal('VAT_TAX_VALUE',12,2)->nullable();
            $table->decimal('COMM_INDUSTR_TAX',12,2)->nullable();
            $table->decimal('NET_VALUE',12,2)->nullable();
            // $table->unsignedBigInteger('INV_ID')->nullable(); 
            // $table->foreign('INV_ID')->references('INV_ID')->on('INVOICES'); 
            $table->smallInteger('TAXT_PERCENTAGE')->nullable();
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
        Schema::dropIfExists('INVOICE_ITEMS');
    }
}
