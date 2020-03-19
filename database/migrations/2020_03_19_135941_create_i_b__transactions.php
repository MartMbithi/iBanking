<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIBTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i_b__transactions', function (Blueprint $table) {
            $table->bigIncrements('tr_id')->unique();
            $table->string('tr_code');
            $table->integer('account_id');
            $table->integer('acc_name');
            $table->string('acc_name');
            $table->string('account_number');
            $table->string('acc_type');
            $table->string('acc_amount');
            $table->string('acc_type');
            $table->string('acc_amount');
            $table->string('tr_type');
            $table->string('tr_status');
            $table->string('client_id');
            $table->string('client_name');
            $table->string('client_national_id');
            $table->string('transaction_amt');
            $table->string('client_phone');
            $table->string('receiving_acc_no');
            $table->string('receiving_acc_name');
            $table->string('receiving_acc_holder');
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
        Schema::dropIfExists('i_b__transactions');
    }
}
