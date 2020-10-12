<?php

namespace App\Providers;

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
        $this->app->bind(\App\Repository\Interfaces\UserRepositoryInterface::class, \App\Repository\UserRepository::class);
        $this->app->bind(\App\Repository\Interfaces\ProgramRepositoryInterface::class, \App\Repository\ProgramRepository::class);
        $this->app->bind(\App\Repository\Interfaces\SupportRepositoryInterface::class, \App\Repository\SupportRepository::class);
        $this->app->bind(\App\Repository\Interfaces\ScaleRepositoryInterface::class, \App\Repository\ScaleRepository::class);
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
