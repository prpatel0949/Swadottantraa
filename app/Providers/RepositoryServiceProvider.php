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
        $this->app->bind(\App\Repository\Interfaces\WorkoutRepositoryInterface::class, \App\Repository\WorkoutRepository::class);
        $this->app->bind(\App\Repository\Interfaces\TransactionRepositoryInterface::class, \App\Repository\TransactionRepository::class);
        $this->app->bind(\App\Repository\Interfaces\ReportRepositoryInterface::class, \App\Repository\ReportRepository::class);
        $this->app->bind(\App\Repository\Interfaces\ClientRepositoryInterface::class, \App\Repository\ClientRepository::class);
        $this->app->bind(\App\Repository\Interfaces\EmotionRepositoryInterface::class, \App\Repository\EmotionRepository::class);
        $this->app->bind(\App\Repository\Interfaces\GeneralRepositoryInterface::class, \App\Repository\GeneralRepository::class);
        $this->app->bind(\App\Repository\Interfaces\CouponRepositoryInterface::class, \App\Repository\CouponRepository::class);
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
