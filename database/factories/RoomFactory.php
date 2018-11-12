<?php

use App\BB\Entities\Room;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Room::class, function (Faker $faker) {
    return [
        'name' => $faker->colorName,
        'price' => $faker->numberBetween(1000, 10000),
    ];
});
