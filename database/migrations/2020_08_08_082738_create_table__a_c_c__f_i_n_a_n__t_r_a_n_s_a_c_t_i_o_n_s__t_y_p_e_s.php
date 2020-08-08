<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableACCFINANTRANSACTIONSTYPES extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('FINAN_TRANSACTIONS_TYPES', function (Blueprint $table) {
            $table->bigIncrements('TRANSACTION_TYPE_ID');
            $table->string('TRANSACTION_TYPE',150)->nullable();
            $table->tinyInteger('SYSTEM_LOCKUP')->nullable();
            $table->string('NOTES',150)->nullable();
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('FINAN_TRANSACTIONS_TYPES');
    }
}
