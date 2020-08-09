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
        Schema::create('cheques', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->datetime('transaction_date')->nullable();
            $table->string('cheque_no',150)->nullable();
            $table->datetime('due_date')->nullable();
            $table->datetime('release_date')->nullable();
            $table->string('person_name',150)->nullable();
            $table->string('bank_name',150)->nullable();
            $table->tinyInteger('trans_type')->nullable();
            $table->decimal('amount',12,2)->nullable();
            $table->text('cheque_image')->nullable();
            $table->string('notes',300)->nullable();
            $table->tinyInteger('return_back_cheque')->nullable();
            $table->datetime('return_back_date')->nullable();
            $table->string('return_back_notes',150)->nullable();
            $table->integer('cheque_serial')->nullable();
            $table->integer('company_id')->nullable();
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
        Schema::dropIfExists('cheques');
    }
}
