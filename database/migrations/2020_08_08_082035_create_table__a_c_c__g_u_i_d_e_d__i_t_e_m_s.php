<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableACCGUIDEDITEMS extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('GUIDED_ITEMS', function (Blueprint $table) {
            $table->bigIncrements('GUIDED_ITEM_ID');
            $table->string('GUIDED_ITEM_NAME',150)->nullable();
            $table->string('GUIDED_ITEM_CODE',150)->nullable();
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
        Schema::dropIfExists('GUIDED_ITEMS');
    }
}
