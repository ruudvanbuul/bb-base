<?php
namespace App\Doctrine\Mappings;

use App\BB\Entities\City;
use App\BB\Entities\Country;
use App\BB\Entities\Location;
use LaravelDoctrine\Fluent\EntityMapping;
use LaravelDoctrine\Fluent\Fluent;

class CityMapping extends EntityMapping
{
    /**
     * Returns the fully qualified name of the class that this mapper maps.
     *
     * @return string
     */
    public function mapFor()
    {
        return City::class;
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
        $builder->hasMany(Location::class)
            ->mappedBy('city')
            ->orderBy('property.id')
            ->cascadeAll();
        $builder->belongsTo(Country::class)->fetchEager();
    }
}