<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function exchanges()
    {
        return $this->belongsToMany('App\Exchange');
    }
}
