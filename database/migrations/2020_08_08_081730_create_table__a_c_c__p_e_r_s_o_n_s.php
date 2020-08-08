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
        Schema::create('PERSONS', function (Blueprint $table) {
            $table->bigIncrements('PERSON_ID');
            $table->string('PERSON_NAME',150)->nullable(); 
            $table->string('PERSON_NICK_NAME',150)->nullable(); 
            // $table->unsignedBigInteger('PERSON_TYPE_ID')->nullable(); 
            // $table->foreign('PERSON_TYPE_ID')->references('PERSON_TYPE_ID')->on('PERSON_TYPES'); 
            $table->string('LEGAL_ENTITY',150)->nullable(); 
            $table->string('ADDRESS',150)->nullable(); 
            $table->string('PHONE1',50)->nullable(); 
            $table->string('PHONE2',50)->nullable(); 
            $table->string('FAX',50)->nullable(); 
            $table->string('CONTACT_PERSON_NAME',150)->nullable(); 
            $table->string('CONTACT_PERSON_MOBILE',50)->nullable(); 
            $table->string('CHAIRMAN_PERSON_NAME',150)->nullable(); 
            $table->string('EMAIL',150)->nullable(); 
            $table->string('WEB_SITE',150)->nullable(); 
            $table->string('TAX_AUTHORITY',150)->nullable(); 
            $table->string('REGISTERATION_NO',150)->nullable(); 
            $table->string('COMMERCIAL_REGISTER',150)->nullable(); 
            $table->string('TAX_CARD',150)->nullable(); 
            $table->decimal('OPEN_BALANCE',12,2)->nullable(); 
            $table->datetime('BALANCE_START_DATE')->nullable(); 
            // $table->unsignedBigInteger('COMPANY_ID')->nullable();    
            // $table->foreign('COMPANY_ID')->references('COMPANY_ID')->on('COMPANY');
            $table->tinyInteger('Taxable')->nullable(); 
            $table->tinyInteger('ACTIVE')->nullable(); 
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
        Schema::dropIfExists('PERSONS');
    }
}
