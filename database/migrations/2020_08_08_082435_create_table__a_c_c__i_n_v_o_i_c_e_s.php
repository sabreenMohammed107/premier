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
        Schema::create('INVOICES', function (Blueprint $table) {
            $table->bigIncrements('INV_ID');
            $table->datetime('INV_DATE')->nullable();
            $table->tinyInteger('APPROVED')->nullable();
            $table->integer('INVOICE_NO')->nullable();
            $table->integer('SERIAL')->nullable();
            // $table->unsignedBigInteger('PERSON_ID')->nullable();    
            // $table->foreign('PERSON_ID')->references('PERSON_ID')->on('PERSONS');
            $table->string('PERSON_NAME')->nullable();
            // $table->unsignedBigInteger('COMPANY_ID')->nullable();    
            // $table->foreign('COMPANY_ID')->references('COMPANY_ID')->on('COMPANY');
            // $table->unsignedBigInteger('OUTGOING_TYPE_ID')->nullable();    
            // $table->foreign('OUTGOING_TYPE_ID')->references('OUTGOING_TYPE_ID')->on('OUTGOING_TYPES');
            // $table->unsignedBigInteger('PURCHASING_TYPE_ID')->nullable();    
            // $table->foreign('PURCHASING_TYPE_ID')->references('PURCHASING_TYPE_ID')->on('PURCHASING_TYPES');
            // $table->unsignedBigInteger('SERVICE_TYPE_ID')->nullable();    
            // $table->foreign('SERVICE_TYPE_ID')->references('SERVICE_TYPE_ID')->on('SERVICES_TYPES');
            $table->decimal('TOTAL_ITEMS_PRICE',12,2)->nullable();
            $table->decimal('TOTAL_ITEMS_DISCOUNT',12,2)->nullable();
            $table->decimal('TOTAL_PRICE_POST_DISCOUNTS',12,2)->nullable();
            $table->decimal('TOTAL_VAT')->nullable();
            $table->decimal('TOTAL_COMM_INDUSTR_TAX',12,2)->nullable();
            $table->integer('DISCOUNT_NOTICE_SERIAL')->nullable();
            $table->decimal('NET_INVOICE',12,2);
            $table->tinyinteger('RETURN_BACK_INVOICE')->nullable();
            $table->datetime('RETURN_BACK_DATE')->nullable();
            $table->string('RETURN_BACK_NOTES',300)->nullable();
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
        Schema::dropIfExists('INVOICES');
    }
}
