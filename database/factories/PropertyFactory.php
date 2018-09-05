<?php

use Faker\Generator as Faker;
use \App\BB\Entities\Property;
use \App\BB\Entities\Location;

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

$factory->define(Property::class, function (Faker $faker, array $attributes) {
    return [
        'name' => $faker->name,
    ];
});
