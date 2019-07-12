<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCryptosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cryptos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image_url')->nullable();
            $table->string('coincap_id')->nullable();
            $table->string('coin_marketap_id')->nullable();
            $table->string('coin_marketcap_slug')->nullable();
            $table->string('name')->nullable();
            $table->string('symbol')->nullable();
            $table->string('data_last_updated')->nullable();
            $table->string('price_last_updated')->nullable();
            $table->string('date_added')->nullable();
            $table->boolean('mineable')->default(false);
            $table->integer('num_market_pairs')->nullable();
            $table->integer('coin_marketcap_rank')->nullable();
            $table->decimal('circulating_supply', 40, 20)->nullable();
            $table->decimal('total_supply', 40, 20)->nullable();
            $table->decimal('max_supply', 40, 20)->nullable();
            $table->decimal('percent_change_24h_usd', 40, 20)->nullable();
            $table->decimal('price_usd', 40, 20)->nullable();
            $table->decimal('percent_change_1h_usd', 40, 20)->nullable();
            $table->decimal('volume_24h_usd', 40, 20)->nullable();
            $table->decimal('percent_change_7d_usd', 40, 20)->nullable();
            $table->decimal('vwap_24hr', 40, 20)->nullable();
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
        Schema::dropIfExists('cryptos');
    }
}
