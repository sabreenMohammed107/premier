<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableACCBALANCEMONTHS extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('BALANCE_MONTHS', function (Blueprint $table) {
            $table->bigIncrements('MONTH_ID');
            $table->smallInteger('YEAR')->nullable();
            $table->tinyInteger('MONTH_NO')->nullable();
            $table->datetime('PERIOD_FROM_DATE')->nullable();
            $table->datetime('PERIOD_END_DATE')->nullable();
            // $table->unsignedBigInteger('COMPANY_ID')->nullable();    
            // $table->foreign('COMPANY_ID')->references('COMPANY_ID')->on('COMPANY');
            $table->tinyInteger('MONTH_TYPE')->nullable();
            $table->datetime('PERIOD_OPEN_DATE')->nullable();
            $table->datetime('PERIOD_CLOSED_DATE')->nullable();
            $table->string('NOTES',4000)->nullable();
            $table->tinyInteger('CAN_CHANGE')->nullable();
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
        Schema::dropIfExists('BALANCE_MONTHS');
    }
}
