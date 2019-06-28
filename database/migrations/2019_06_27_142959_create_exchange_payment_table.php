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
        Schema::create('exchange_payment', function (Blueprint $table) {
            $table->integer('exchange_id')->unsigned()->nullable();
            $table->foreign('exchange_id')->references('id')
                    ->on('exchanges')->onDelete('cascade');

            $table->integer('payment_id')->unsigned()->nullable();
            $table->foreign('payment_id')->references('id')
                    ->on('payment_types')->onDelete('cascade');
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
        Schema::dropIfExists('exchange_payment');
    }
}
