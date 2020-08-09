<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableACCPERSONS extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('person_name',150)->nullable(); 
            $table->string('person_nick_name',150)->nullable(); 
            $table->string('legal_entity',150)->nullable(); 
            $table->string('address',150)->nullable(); 
            $table->string('phone1',50)->nullable(); 
            $table->string('phone2',50)->nullable(); 
            $table->string('fax',50)->nullable(); 
            $table->string('contact_person_name',150)->nullable(); 
            $table->string('contact_person_mobile',50)->nullable(); 
            $table->string('chairman_person_name',150)->nullable(); 
            $table->string('email',150)->nullable(); 
            $table->string('website',150)->nullable(); 
            $table->string('tax_authority',150)->nullable(); 
            $table->string('registeration_no',150)->nullable(); 
            $table->string('commercial_register',150)->nullable(); 
            $table->string('tax_card',150)->nullable(); 
            $table->decimal('open_balance',12,2)->nullable(); 
            $table->datetime('balance_start_date')->nullable(); 
            $table->tinyInteger('taxable')->nullable(); 
            $table->tinyInteger('active')->nullable(); 
            $table->string('notes',300)->nullable(); 
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
        Schema::dropIfExists('persons');
    }
}
