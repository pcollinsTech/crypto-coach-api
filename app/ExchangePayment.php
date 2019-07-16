<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExchangePayment extends Model
{
    protected $table = 'exchange_payment';



    protected $fillable = [
        'exchange_id',
        'payment_id'
    ];
}
