<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExchangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exchanges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('exchange_id');
            $table->string('name');
            $table->string('website');
            $table->string('bg_hex');
            $table->string('data_start');
            $table->string('data_end');
            $table->string('data_quote_start');
            $table->string('data_quote_end');
            $table->string('data_orderbook_start');
            $table->string('data_orderbook_end');
            $table->string('data_trade_start');
            $table->string('data_trade_end');
            $table->integer('data_trade_count');
            $table->integer('data_symbols_count');
            $table->text('description');
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
        Schema::dropIfExists('exchanges');
    }
}
