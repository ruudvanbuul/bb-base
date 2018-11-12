<?php

use App\BB\Entities\City;
use App\BB\Entities\Location;
use App\BB\Entities\Property;
use App\BB\Entities\Room;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class PropertySeeder extends Seeder
{
    /**
     * Seed countries
     *
     * @param Collection|City[] $cities
     * @return Collection|Property[]
     */
    public function run(Collection $cities) : Collection
    {
        $properties = entity(Property::class, 5000)
            ->make()
            ->each(function ($property) use ($cities) {
                $property->setLocation(
                    entity(Location::class)->make(['city' => $cities->random()])
                );

                for ($i = 0; $i < rand(1, 5); $i++) {
                    $property->addRoom(
                        entity(Room::class)->make()
                    );
                }

                EntityManager::persist($property);
            });

        EntityManager::flush();

        return $properties;
    }
}
