<?php

use App\BB\Entities\City;
use App\BB\Entities\Country;
use Illuminate\Support\Collection;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Seed cities
     *
     * @param Collection|Country[] $countries
     * @return City[]
     */
    public function run(Collection $countries)
    {
        $cities = new Collection();

        foreach ($countries->all() as $country) {
            $cities = $cities->merge(
                entity(City::class, rand(10, 100))
                    ->make(['country' => $country])
                    ->each(function ($entity) {
                        EntityManager::persist($entity);
                    })
            );
        }

        EntityManager::flush();

        return $cities;
    }
}
