<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{

    protected  $guarded = [
        'id'
    ];
    protected $casts = [
        'chat_urls' => 'array',
    ];



    public function getImageAttribute()
    {
        return $this->profile_image;
    }

    function cryptos()
    {
        return $this->hasMany('App\Crypto');
    }

    function fiats()
    {
        return $this->hasMany('App\Fiat');
    }

    function countries()
    {
        return $this->hasMany('App\Country');
    }

    function payments()
    {
        return $this->hasMany('App\Payment');
    }
}
