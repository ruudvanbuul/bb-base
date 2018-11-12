<?php
namespace App\Doctrine\Mappings;

use App\BB\Entities\Country;
use App\BB\Entities\City;
use LaravelDoctrine\Fluent\EntityMapping;
use LaravelDoctrine\Fluent\Fluent;

class CountryMapping extends EntityMapping
{
    /**
     * Returns the fully qualified name of the class that this mapper maps.
     *
     * @return string
     */
    public function mapFor()
    {
        return Country::class;
    }

    /**
     * Load the object's metadata through the Metadata Builder object.
     *
     * @param Fluent $builder
     */
    public function map(Fluent $builder)
    {
        $builder->increments('id');
        $builder->string('code');
        $builder->string('name');
        $builder->hasMany(City::class)
            ->mappedBy('country')
            ->orderBy('name')
            ->cascadeAll()
            ->fetchExtraLazy();
    }
}