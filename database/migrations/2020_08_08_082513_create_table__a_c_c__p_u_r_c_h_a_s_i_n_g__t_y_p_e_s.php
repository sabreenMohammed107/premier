<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableACCPURCHASINGTYPES extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PURCHASING_TYPES', function (Blueprint $table) {
            $table->bigIncrements('PURCHASING_TYPE_ID');
            $table->string('PURCHASING_TYPES_NAME',150)->nullable();
            $table->tinyInteger('SYSTEM_LOCKUP')->nullable();
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
        Schema::dropIfExists('PURCHASING_TYPES');
    }
}
