<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crypto extends Model
{
    protected $guarded = [
        'id'
    ];

    protected $casts = [
        'message_board_urls' => 'array',
        'announcement_urls' => 'array',
        'chat_urls' => 'array',
        'explorer_urls' => 'array',
    ];

    public function exchanges()
    {
        return $this->belongsToMany('App\Exchange');
    }
}
