<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableACCBUSINESSITEMSSETUPCASES extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('BUSINESS_ITEMS_SETUP_CASES', function (Blueprint $table) {
            $table->bigIncrements('ITEM_CASE_ID');
            $table->string('ITEM_CASE_NAME',150)->nullable();
            $table->string('NOTES',150)->nullable();
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
        Schema::dropIfExists('BUSINESS_ITEMS_SETUP_CASES');
    }
}
