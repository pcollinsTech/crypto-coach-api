<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FiatCurrency extends Model
{
    public function exchanges()
    {
        return $this->belongsToMany('App\Exchange')
            ->withTimestamps();
    }
}
