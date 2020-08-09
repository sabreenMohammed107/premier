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
        Schema::create('services_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('service_type',150)->nullable();
            $table->tinyInteger('system_lockup')->nullable();
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
        Schema::dropIfExists('services_types');
    }
}
