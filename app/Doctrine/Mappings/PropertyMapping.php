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
        // This will result in an autoincremented integer
        $builder->increments('id');

        // Both strings will be varchars
        $builder->string('name');

        // This will map an association with Location as one-to-one
        $builder->hasOne(Location::class)->mappedBy('property')->cascadeAll();

        // This will map an association with Room as one-to-many
        $builder->hasMany(Room::class)->mappedBy('property')->cascadeAll();
    }
}