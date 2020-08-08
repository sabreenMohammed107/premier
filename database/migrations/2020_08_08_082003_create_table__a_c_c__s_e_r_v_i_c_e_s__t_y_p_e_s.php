<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableACCSERVICESTYPES extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SERVICES_TYPES', function (Blueprint $table) {
            $table->bigIncrements('SERVICE_TYPE_ID');
            $table->string('SERVICE_TYPE',150)->nullable();
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
        Schema::dropIfExists('SERVICES_TYPES');
    }
}
