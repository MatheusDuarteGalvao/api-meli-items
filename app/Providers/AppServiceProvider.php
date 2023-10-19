<?php

namespace App\Providers;

use App\Repositories\AdvertEloquentORM;
use App\Repositories\AdvertRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            AdvertRepositoryInterface::class,
            AdvertEloquentORM::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
