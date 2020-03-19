<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIBBankAccounts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i_b_bank_accounts', function (Blueprint $table) {
            $table->bigIncrements('account_id')->unique();
            $table->string('acc_name');
            $table->string('account_number');
            $table->string('acc_type');
            $table->string('acc_rates');
            $table->string('acc_status');
            $table->string('acc_amount');
            $table->integer('client_id');
            $table->string('client_name');
            $table->string('client_national_id');
            $table->string('client_phone');
            $table->string('client_number');
            $table->string('client_email');
            $table->string('client_adr');
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
        Schema::dropIfExists('i_b_bank_accounts');
    }
}
