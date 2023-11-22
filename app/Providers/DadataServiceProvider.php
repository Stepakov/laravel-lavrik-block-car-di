<?php

namespace App\Providers;

use Dadata\DadataClient;
use Illuminate\Support\ServiceProvider;

class DadataServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton( DadataClient::class ,function ($app) {
            return new DadataClient( config( 'dadata.token' ), config( 'dadata.secret' ) );
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

    }
}
