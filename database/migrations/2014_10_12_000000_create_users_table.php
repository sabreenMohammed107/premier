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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_name',150)->nullable();
            $table->string('user_full_name',150)->nullable();
            //email column is not defined in the ERD
            // $table->string('email',150)->nullable();
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('password',150);
            $table->string('notes',300)->nullable();
            $table->tinyInteger('active')->nullable();
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
        // Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('users');
    }
}
