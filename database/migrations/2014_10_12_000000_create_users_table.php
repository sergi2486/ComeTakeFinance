<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->bigInteger('phone_number')->unique();
            $table->string('city');
            $table->string('quarter');
            $table->string('email')->unique();
            $table->string('validation_token')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

         Schema::table('orders', function(Blueprint $table){
            $table->integer('user_id')->unsigned()->index();
        });
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
