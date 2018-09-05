<?php

use Illuminate\Database\Seeder;
use \App\BB\Entities\Property;
use \App\BB\Entities\Location;
use \App\BB\Entities\Room;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $properties = entity(Property::class, 50)->make()->each(function ($property) {
            $property->setLocation(entity(Location::class)->make());
            for ($i = 0; $i < rand(1, 5); $i++) {
                $property->addRoom(entity(Room::class)->make());
            }
        });

        foreach ($properties as $property) {
            EntityManager::persist($property);
        }
        EntityManager::flush();
    }
}
