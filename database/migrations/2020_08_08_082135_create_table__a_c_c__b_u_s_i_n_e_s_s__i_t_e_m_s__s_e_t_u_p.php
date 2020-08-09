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
        Schema::create('business_items_setup', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('item_name',150)->nullable();
            $table->float('item_value',10,2)->nullable();
            $table->tinyInteger('active')->nullable();
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
        Schema::dropIfExists('business_items_setup');
    }
}
