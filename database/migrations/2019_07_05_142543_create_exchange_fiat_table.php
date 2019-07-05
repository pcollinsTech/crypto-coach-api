<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExchangeFiatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exchange_fiat', function (Blueprint $table) {
            $table->unsignedBigInteger('exchange_id')->nullable();
            $table->unsignedBigInteger('fiat_id')->nullable();
        });

        Schema::table('exchange_fiat', function (Blueprint $table) {

            $table->foreign('exchange_id')->references('id')->on('exchanges');
            $table->foreign('fiat_id')->references('id')->on('fiats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exchange_fiat');
    }
}
