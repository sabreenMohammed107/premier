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
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('store_item')->nullable(); // the datatype needs to be revised  
            $table->string('item_text',150)->nullable();
            $table->decimal('item_price',12,2)->nullable();
            $table->integer('item_quantity')->nullable();
            $table->decimal('total_item_price',12,2)->nullable();
            $table->decimal('item_discount',12,2)->nullable();
            $table->decimal('total_after_discounts',12,2)->nullable();
            $table->tinyInteger('tax_exemption')->nullable();
            $table->decimal('vat_tax_value',12,2)->nullable();
            $table->decimal('comm_industr_tax',12,2)->nullable();
            $table->decimal('net_value',12,2)->nullable();
            $table->smallInteger('taxt_percentage')->nullable();
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
        Schema::dropIfExists('invoice_items');
    }
}
