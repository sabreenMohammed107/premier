<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableACCCHEQUES extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CHEQUES', function (Blueprint $table) {
            $table->bigIncrements('CHEQUE_ID');
            $table->datetime('TRANSACTION_DATE')->nullable();
            $table->string('CHEQUE_NO',150)->nullable();
            $table->datetime('DUE_DATE')->nullable();
            $table->datetime('RELEASE_DATE')->nullable();
            // $table->unsignedBigInteger('PERSON_ID')->nullable();    
            // $table->foreign('PERSON_ID')->references('PERSON_ID')->on('PERSONS');
            $table->string('PERSON_NAME',150)->nullable();
            // $table->unsignedBigInteger('BANK_ID')->nullable();    
            // $table->foreign('BANK_ID')->references('BANK_ID')->on('BANKS');
            $table->string('BANK_NAME',150)->nullable();
            $table->tinyInteger('TRANS_TYPE')->nullable();
            $table->decimal('AMOUNT',12,2)->nullable();
            // $table->unsignedBigInteger('CA')->nullable();    
            // $table->foreign('CA')->references('CA')->on('FINAN_TRANSACTIONS_TYPES');
            $table->text('CHEQUE_IMAGE')->nullable();
            $table->string('NOTES',300)->nullable();
            $table->tinyInteger('RETURN_BACK_CHEQUE')->nullable();
            $table->datetime('RETURN_BACK_DATE')->nullable();
            $table->string('RETURN_BACK_NOTES',150)->nullable();
            $table->integer('CHEQUE_SERIAL')->nullable();
            $table->integer('COMPANY_ID')->nullable();
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
        Schema::dropIfExists('CHEQUES');
    }
}
