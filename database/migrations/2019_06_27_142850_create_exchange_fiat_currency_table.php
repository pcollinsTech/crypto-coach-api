<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExchangeFiatCurrencyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exchange_fiat_currency', function (Blueprint $table) {
            $table->integer('exchange_id')->unsigned()->nullable();
            $table->foreign('exchange_id')->references('id')
                    ->on('exchanges')->onDelete('cascade');

            $table->integer('fiat_currency_id')->unsigned()->nullable();
            $table->foreign('fiat_currency_id')->references('id')
                    ->on('fiat_currencies')->onDelete('cascade');

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
        Schema::dropIfExists('exchange_fiat_currency');
    }
}
