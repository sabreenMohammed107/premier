<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableACCCOMPANY extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('COMPANY', function (Blueprint $table) {
            $table->bigIncrements('COMPANY_ID');
            $table->string('COMPANY_OFFICIAL_NAME',150)->nullable();
            $table->string('COMPANY_NICK_NAME',150)->nullable();
            $table->string('LEGAL_ENTITY',150)->nullable();
            $table->string('ADDRESS',300)->nullable();
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
            $table->string('COMPANY_LOGO',250)->nullable();
            $table->integer('EQUITY_CAPTIAL')->nullable();
            // $table->unsignedBigInteger('BANK_ID')->nullable();    
            // $table->foreign('BANK_ID')->references('BANK_ID')->on('BANKS');
            // $table->unsignedBigInteger('SAFE_ID')->nullable();    
            // $table->foreign('SAFE_ID')->references('SAFE_ID')->on('SAFE');
            $table->tinyInteger('TAXABLE')->nullable();
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('COMPANY');
    }
}
