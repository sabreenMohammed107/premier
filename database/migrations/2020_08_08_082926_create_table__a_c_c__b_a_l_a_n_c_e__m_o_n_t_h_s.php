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
        Schema::create('balance_months', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->smallInteger('year')->nullable();
            $table->tinyInteger('month_no')->nullable();
            $table->datetime('period_from_date')->nullable();
            $table->datetime('period_end_date')->nullable();
            $table->tinyInteger('month_type')->nullable();
            $table->datetime('period_open_date')->nullable();
            $table->datetime('period_closed_date')->nullable();
            $table->string('notes',4000)->nullable();
            $table->tinyInteger('can_change')->nullable();
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
        Schema::dropIfExists('balance_months');
    }
}
