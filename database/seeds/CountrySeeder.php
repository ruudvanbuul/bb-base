<?php

use App\BB\Entities\Country;
use Illuminate\Support\Collection;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Seed countries
     *
     * @return Collection|Country[]
     */
    public function run() : Collection
    {
        $countries = entity(Country::class, 10)
            ->make()
            ->each(function ($entity) {
                EntityManager::persist($entity);
            });

        EntityManager::flush();

        return $countries;
    }
}
