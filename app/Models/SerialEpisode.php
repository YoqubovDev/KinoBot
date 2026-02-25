<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SerialEpisode extends Model
{
    protected $fillable = [
        'serial_id',
        'episode_number',
        'file_id',
    ];

    public function serial()
    {
        return $this->belongsTo(Serial::class);
    }
}
