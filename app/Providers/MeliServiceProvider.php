<?php

namespace App\Providers;

use App\Services\MeliService;
use App\Services\Contracts\MeliServiceContract;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class MeliServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            MeliServiceContract::class,
            MeliService::class
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
            MeliServiceContract::class,
        ];
    }
}
