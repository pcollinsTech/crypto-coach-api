<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCryptoExchangeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crypto_exchange', function (Blueprint $table) {
            $table->unsignedBigInteger('exchange_id')->nullable();
            $table->unsignedBigInteger('crypto_id')->nullable();
        });

        Schema::table('crypto_exchange', function (Blueprint $table) {

            $table->foreign('exchange_id')->references('id')->on('exchanges');
            $table->foreign('crypto_id')->references('id')->on('cryptos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exchange_crypto');
    }
}
