<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    public $timestamps = false;

    public function location()
    {
        return $this->hasOne(Location::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
