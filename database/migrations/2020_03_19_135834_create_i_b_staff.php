<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIBStaff extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i_b_staff', function (Blueprint $table) {
            $table->bigIncrements('staff_id')->unique();
            $table->string('name');
            $table->string('staf_number');
            $table->string('phone');
            $table->string('email');
            $table->string('password');
            $table->string('sex');
            $table->string('profile_pic');
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
        Schema::dropIfExists('i_b_staff');
    }
}
