<?php

namespace App\Providers;

use App\Repositories\Contracts\{
    CarRepositoryInterface,
    UserRepositoryInterface,
    UsersCarsRepositoryInterface,
};
use App\Repositories\{
    CarRepository,
    UserRepository,
    UserCarsRepository,
};

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            CarRepositoryInterface::class,
            CarRepository::class,
        );

        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class,
        );

        $this->app->bind(
            UserCarsRepositoryInterface::class,
            UserCarsRepository::class,
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
