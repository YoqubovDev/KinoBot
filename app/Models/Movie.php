<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'code',
        'channel_id',
        'message_id',
        'file_id',
        'views',
    ];
}
