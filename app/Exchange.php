<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{

    protected  $fillable = [
        'exchange_id',
        'name',
        'website',
        'bg_hex',
        'data_start',
        'data_end',
        'data_quote_start',
        'data_quote_end',
        'data_orderbook_start',
        'data_orderbook_end',
        'data_trade_start',
        'data_trade_end',
        'data_trade_count',
        'data_symbols_count',
    ];

    function cryptos()
    {
        return $this->belongsToMany('App\CryptoCurrency')
            ->withTimestamps();
    }

    function fiats()
    {
        return $this->belongsToMany('App\FiatCurrency')
            ->withTimestamps();
    }

    function countries()
    {
        return $this->belongsToMany('App\Country')
            ->withTimestamps();
    }

    function payments()
    {
        return $this->belongsToMany('App\PaymentType')
            ->withTimestamps();
    }
}
