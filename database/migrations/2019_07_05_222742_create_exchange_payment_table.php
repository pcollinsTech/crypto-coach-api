<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExchangePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exchange_paymment', function (Blueprint $table) {
            $table->unsignedBigInteger('exchange_id')->nullable();
            $table->unsignedBigInteger('payment_id')->nullable();
        });

        Schema::table('exchange_paymment', function (Blueprint $table) {

            $table->foreign('exchange_id')->references('id')->on('exchanges');
            $table->foreign('payment_id')->references('id')->on('payments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exchange_paymment');
    }
}
