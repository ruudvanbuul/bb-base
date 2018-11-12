<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public $timestamps = false;

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
