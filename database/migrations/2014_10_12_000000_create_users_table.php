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
            $table->bigIncrements('user_id')->unique();
            $table->string('fname');
            $table->string('lname');
            $table->string('username');
            $table->string('email');
            $table->string('dpic');
            $table->string('cover');
            $table->string('dob');
            $table->string('phone');
            $table->string('location');
            $table->string('website');
            $table->string('user_number');
            $table->string('in_username');
            $table->string('git_username');
            $table->sring('twt_username');
            $table->longText('bio');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
        Schema::dropIfExists('users');
    }
}
