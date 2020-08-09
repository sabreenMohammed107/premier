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
        Schema::create('finan_transactions_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('transaction_type',150)->nullable();
            $table->tinyInteger('system_lockup')->nullable();
            $table->string('notes',150)->nullable();
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
      //Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('finan_transactions_types');
    }
}
