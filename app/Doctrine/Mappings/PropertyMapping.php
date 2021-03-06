<?php

namespace App\Doctrine\Mappings;

use App\BB\Entities\Property;
use App\BB\Entities\Location;
use App\BB\Entities\Room;
use LaravelDoctrine\Fluent\EntityMapping;
use LaravelDoctrine\Fluent\Fluent;

class PropertyMapping extends EntityMapping
{
    /**
     * Returns the fully qualified name of the class that this mapper maps.
     *
     * @return string
     */
    public function mapFor()
    {
        return Property::class;
    }

    /**
     * Load the object's metadata through the Metadata Builder object.
     *
     * @param Fluent $builder
     */
    public function map(Fluent $builder)
    {
        $builder->increments('id');
        $builder->string('name');
        $builder->hasOne(Location::class)
            ->mappedBy('property')
            ->cascadeAll()
            ->fetchEager();
        $builder->hasMany(Room::class)
            ->mappedBy('property')
            ->orderBy('price')
            ->cascadeAll()
            ->fetchEager();
    }
}