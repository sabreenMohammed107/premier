<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableACCPERSONTYPES extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PERSON_TYPES', function (Blueprint $table) {
            $table->bigIncrements('PERSON_TYPE_ID');
            $table->string('PERSON_TYPE_NAME',150)->nullable();
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
        Schema::dropIfExists('PERSON_TYPES');
    }
}
