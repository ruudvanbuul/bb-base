<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public $timestamps = false;

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
