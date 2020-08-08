<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableACCOUTGOINGTYPES extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('OUTGOING_TYPES', function (Blueprint $table) {
            $table->bigIncrements('OUTGOING_TYPE_ID');
            $table->string('OUTGOING_TYPE_NAME',150)->nullable();
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
        Schema::dropIfExists('OUTGOING_TYPES');
    }
}
