<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableACCBALANCEYEAR extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balance_years', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->smallInteger('year')->nullable();
            $table->datetime('period_from_date')->nullable();
            $table->datetime('period_to_date')->nullable();
            $table->tinyInteger('year_type')->nullable();
            $table->datetime('period_open_date')->nullable();
            $table->datetime('period_closed_date')->nullable();
            $table->string('notes',4000)->nullable();
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
        Schema::dropIfExists('balance_years');
    }
}
