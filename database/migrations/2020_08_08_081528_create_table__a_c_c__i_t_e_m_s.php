<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableACCITEMS extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ITEMS', function (Blueprint $table) {
            $table->bigIncrements('ITEM_ID');
            $table->string('ITEM_CODE',150)->nullable();
            $table->string('ITEM_ARABIC_NAME',150)->nullable();
            $table->string('ITEM_ENGLISH_NAME',150)->nullable();
            // $table->unsignedBigInteger('COMPANY_ID')->nullable();    
            // $table->foreign('COMPANY_ID')->references('COMPANY_ID')->on('COMPANY');
            $table->datetime('BALANCE_START_DATE')->nullable();
            $table->decimal('TOTAL_OPEN_BALANCE_QTY',12,2)->nullable();
            $table->decimal('TOTAL_OPEN_BALANCE_COST',12,2)->nullable();
            $table->integer('OPEN_ITEM_PRICE')->nullable();
            $table->string('NOTES',300)->nullable();
            $table->string('item_image',250)->nullable();

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
        Schema::dropIfExists('ITEMS');
    }
}
