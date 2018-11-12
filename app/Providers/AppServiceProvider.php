<?php

namespace App\Providers;

use App\BB\Entities\Property;
use App\BB\Repositories\PropertyRepository;
use App\Repositories\DoctrinePropertyRepository;
use App\Repositories\EloquentPropertyRepository;
use EntityManager;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PropertyRepository::class, function () {
//            return new EloquentPropertyRepository();
            return new DoctrinePropertyRepository(
                EntityManager::getRepository(Property::class)
            );
        });
    }
}
