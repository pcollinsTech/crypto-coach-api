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
            $table->string('coincap_id')->nullable();
            $table->string('coincap_slug')->nullable();
            $table->string('coin_marketap_id')->nullable();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('origin_country')->nullable();
            $table->string('image_url')->nullable();
            $table->string('operating_country')->nullable();
            $table->boolean('hacked')->nullable();
            $table->boolean('lending')->nullable();
            $table->boolean('margin_trading')->nullable();
            $table->boolean('negative_trading_fees')->nullable();
            $table->string('website')->nullable();
            $table->boolean('centralized')->nullable();
            $table->boolean('beginner_friendly')->nullable();
            $table->decimal('percent_total_volume', 40, 20)->nullable();
            $table->integer('socket')->nullable();
            $table->decimal('volume_24hr_usd', 40, 20)->nullable();
            $table->string('coincap_updated_at')->nullable();
            $table->integer('trading_pairs')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('blog_url')->nullable();
            $table->string('fee_url')->nullable();
            $table->json('chat_urls')->nullable();
            $table->string('grade')->nullable();
            $table->string('rank')->nullable();
            $table->string('bg_hex')->nullable();
            $table->string('date_launched')->nullable();
            $table->string('first_historical_data')->nullable();
            $table->string('last_historical_data')->nullable();
            $table->string('data_quote_start')->nullable();
            $table->string('data_quote_end')->nullable();
            $table->string('data_orderbook_start')->nullable();
            $table->string('data_orderbook_end')->nullable();
            $table->string('data_trade_start')->nullable();
            $table->string('data_trade_end')->nullable();
            $table->text('notice')->nullable();
            $table->integer('data_trade_count')->nullable();
            $table->integer('data_symbols_count')->nullable();
            $table->text('description')->nullable();
            $table->text('fees')->nullable();
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
