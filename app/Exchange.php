<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{

    protected  $guarded = [
        'id'
    ];

    protected $casts = [
        'payments' => 'array'
    ];

    function cryptos()
    {
        return $this->belongsToMany('App\Crypto');
    }

    function fiats()
    {
        return $this->belongsToMany('App\Fiat');
    }

    function countries()
    {
        return $this->belongsToMany('App\Country');
    }

    function payments()
    {
        return $this->belongsToMany('App\Payment');
    }
}
