<?php

namespace App\Providers;

use App\Services\AdvertService;
use App\Services\Contracts\AdvertServiceContract;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class AdvertServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            AdvertServiceContract::class,
            AdvertService::class
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            AdvertServiceContract::class,
        ];
    }
}
