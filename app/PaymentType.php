<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model
{
    public function exchanges()
    {
        return $this->belongsToMany('App\Exchange')
            ->withTimestamps();
    }
}
