<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSafe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('safes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('safe_name',250);
            $table->string('safe_location',1000)->nullable();
            $table->float('open_balance', 8, 2)->nullable();
            $table->date('balance_start_date')->nullable();
            $table->string('notes',1000)->nullable();
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
        Schema::dropIfExists('safes');
    }
}
