<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountryExchangeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_exchange', function (Blueprint $table) {
            $table->unsignedBigInteger('exchange_id')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
        });

        Schema::table('country_exchange', function (Blueprint $table) {

            $table->foreign('exchange_id')->references('id')->on('exchanges');
            $table->foreign('country_id')->references('id')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('country_exchange');
    }
}
