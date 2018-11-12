<?php
namespace App\Doctrine\Mappings;

use App\BB\Entities\City;
use App\BB\Entities\Property;
use App\BB\Entities\Location;
use LaravelDoctrine\Fluent\EntityMapping;
use LaravelDoctrine\Fluent\Fluent;

class LocationMapping extends EntityMapping
{
    /**
     * Returns the fully qualified name of the class that this mapper maps.
     *
     * @return string
     */
    public function mapFor()
    {
        return Location::class;
    }

    /**
     * Load the object's metadata through the Metadata Builder object.
     *
     * @param Fluent $builder
     */
    public function map(Fluent $builder)
    {
        $builder->increments('id');
        $builder->string('address');
        $builder->belongsTo(City::class)->fetchEager();
        $builder->belongsTo(Property::class);
    }
}