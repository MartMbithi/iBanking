<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIBClients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i_b_clients', function (Blueprint $table) {
            $table->bigIncrements('client_id')->unique();
            $table->string('name');
            $table->string('national_id');
            $table->string('phone');
            $table->string('address');
            $table->string('email');
            $table->string('password');
            $table->string('profile_pic');
            $table->string('client_number');
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
        Schema::dropIfExists('i_b_clients');
    }
}
