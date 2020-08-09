<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableACCFINANTRANSACTIONS extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finan_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->datetime('transaction_date')->nullable();
            $table->integer('permission_code')->nullable();
            $table->integer('invoice_no')->nullable();
            $table->string('person_name',150)->nullable();
            $table->decimal('additive',12,2)->nullable();
            $table->decimal('subtractive',12,2)->nullable();
            $table->string('notes',4000)->nullable();
            $table->string('purch_sales_statement',4000)->nullable();
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
        Schema::dropIfExists('finan_transactions');
    }
}
