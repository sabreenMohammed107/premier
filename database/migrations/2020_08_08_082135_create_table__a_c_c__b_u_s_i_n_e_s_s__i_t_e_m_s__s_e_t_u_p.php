<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableACCBUSINESSITEMSSETUP extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('BUSINESS_ITEMS_SETUP', function (Blueprint $table) {
            $table->bigIncrements('ITEM_ID');
            $table->string('ITEM_NAME',150)->nullable();
            $table->float('ITEM_VALUE',10,2)->nullable();
            // $table->unsignedBigInteger('ITEM_CASE_ID')->nullable();    
            // $table->foreign('ITEM_CASE_ID')->references('ITEM_CASE_ID')->on('BUSINESS_ITEMS_SETUP_CASES');
            // $table->unsignedBigInteger('GUIDED_ITEM_ID')->nullable();    
            // $table->foreign('GUIDED_ITEM_ID')->references('GUIDED_ITEM_ID')->on('GUIDED_ITEMS');
            $table->tinyInteger('ACTIVE')->nullable();
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
        Schema::dropIfExists('BUSINESS_ITEMS_SETUP');
    }
}
