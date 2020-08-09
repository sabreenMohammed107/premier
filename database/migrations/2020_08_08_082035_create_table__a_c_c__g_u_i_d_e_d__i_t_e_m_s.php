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
        Schema::create('guided_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('guided_item_name',150)->nullable();
            $table->string('guided_item_code',150)->nullable();
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
        Schema::dropIfExists('guided_items');
    }
}
