<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crypto extends Model
{
    public function exchanges()
    {
        return $this->belongsToMany('App\Exchange');
    }
}
