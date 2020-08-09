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
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('item_code',150)->nullable();
            $table->string('item_arabic_name',150)->nullable();
            $table->string('item_english_name',150)->nullable();
            $table->datetime('balance_start_date')->nullable();
            $table->decimal('total_open_balance_qty',12,2)->nullable();
            $table->decimal('total_open_balance_cost',12,2)->nullable();
            $table->integer('open_item_price')->nullable();
            $table->string('notes',300)->nullable();
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
        Schema::dropIfExists('items');
    }
}
