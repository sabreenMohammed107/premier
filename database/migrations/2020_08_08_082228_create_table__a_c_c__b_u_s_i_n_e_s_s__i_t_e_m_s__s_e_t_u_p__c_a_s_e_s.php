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
        Schema::create('business_items_setup_cases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('item_case_name',150)->nullable();
            $table->string('notes',150)->nullable();
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
        Schema::dropIfExists('business_items_setup_cases');
    }
}
