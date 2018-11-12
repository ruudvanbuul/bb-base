<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $countries = $this->callWithParams(CountrySeeder::class);
        $cities = $this->callWithParams(CitySeeder::class, $countries);
        $properties = $this->callWithParams(PropertySeeder::class, $cities);
    }

    public function callWithParams($class, $params = null)
    {
        $ret = $this->resolve($class)->run($params);

        if (isset($this->command)) {
            $this->command->getOutput()->writeln("<info>Seeded:</info> $class");
        }

        return $ret;
    }
}
