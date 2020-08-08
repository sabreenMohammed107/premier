<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('USERS', function (Blueprint $table) {
            $table->bigIncrements('USER_ID');
            $table->string('USER_NAME',150)->nullable();
            $table->string('USER_FULL_NAME',150)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('USER_PASSWORD',150);
            $table->string('NOTES',300)->nullable();
            $table->tinyInteger('ACTIVE')->nullable();
            // $table->unsignedBigInteger('COMPANY_ID');
            // $table->foreign('COMPANY_ID')->references('COMPANY_ID')->on('COMPANY');
            // $table->unsignedBigInteger('ROLE_ID')->nullable();
            // $table->foreign('ROLE_ID')->references('ROLE_ID')->on('ROLES');
            $table->rememberToken();
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

        Schema::dropIfExists('USERS');
    }
}
