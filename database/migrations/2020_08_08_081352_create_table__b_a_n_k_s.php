<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBANKS extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('BANKS', function (Blueprint $table) {
            $table->bigIncrements('BANK_ID');
            $table->string('BANK_NAME',150);
            $table->string('BANK_BRANCH_NAME',150)->nullable();
            $table->string('BANK_ACCOUNT_NO',150)->nullable();
            $table->float('OPEN_BALANCE',12,2)->nullable();
            $table->date('BALANCE_START_DATE')->nullable();
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
        Schema::dropIfExists('BANKS');
    }
}
