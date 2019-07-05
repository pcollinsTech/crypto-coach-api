<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CryptoExchange extends Model
{

    protected $table = 'crypto_exchange';



    protected $fillable = [
        'exchange_id',
        'crypto_id'
    ];
}
