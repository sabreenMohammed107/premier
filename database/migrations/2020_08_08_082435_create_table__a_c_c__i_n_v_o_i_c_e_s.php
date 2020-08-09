<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableACCINVOICES extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->datetime('inv_date')->nullable();
            $table->tinyInteger('approved')->nullable();
            $table->integer('invoice_no')->nullable();
            $table->integer('serial')->nullable();
            $table->string('person_name')->nullable();
            $table->decimal('total_items_price',12,2)->nullable();
            $table->decimal('total_items_discount',12,2)->nullable();
            $table->decimal('total_price_post_discounts',12,2)->nullable();
            $table->decimal('total_vat')->nullable();
            $table->decimal('total_comm_industr_tax',12,2)->nullable();
            $table->integer('discount_notice_serial')->nullable();
            $table->decimal('net_invoice',12,2);
            $table->tinyinteger('return_back_invoice')->nullable();
            $table->datetime('return_back_date')->nullable();
            $table->string('return_back_notes',300)->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
