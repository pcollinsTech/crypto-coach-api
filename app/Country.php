<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    protected  $guarded = [
        'id'
    ];
    public function exchanges()
    {
        return $this->belongsToMany('App\Exchange');
    }

    public function fiats()
    {
        return $this->belongsToMany('App\FiatCurrency');
    }
}
