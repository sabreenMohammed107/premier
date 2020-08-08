<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAccUserComp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('USER_COMPANIES', function (Blueprint $table) {
            $table->bigIncrements('USER_COMPANY_ID');
            // $table->unsignedBigInteger('USER_ID');    
            // $table->foreign('USER_ID')->references('USER_ID')->on('USERS');
            // $table->unsignedBigInteger('COMPANY_ID');    
            // $table->foreign('COMPANY_ID')->references('COMPANY_ID')->on('COMPANY');
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

        Schema::dropIfExists('USER_COMPANIES');
    }
}
