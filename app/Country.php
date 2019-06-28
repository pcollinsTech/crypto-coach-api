<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function exchanges()
    {
        return $this->belongsToMany('App\Exchange')
            ->withTimestamps();
    }

    public function fiats()
    {
        return $this->belongsToMany('App\FiatCurrency')
        ->withTimestamps();
    }
}
