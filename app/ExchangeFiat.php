<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExchangeFiat extends Model
{
    protected $table = 'exchange_fiat';



    protected $fillable = [
        'exchange_id',
        'fiat_id'
    ];
}
