<?php

namespace Hosein\Sms;

use Illuminate\Support\ServiceProvider;

class SmsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadViewsFrom(__DIR__.'/Views', 'SmsView');
        $this->publishes([
            __DIR__.'/Views' => resource_path('views/vendor/SmsView'),
        ],"smstview");
        $this->loadMigrationsFrom(__DIR__.'/Migrations');
        $this->publishes([
            __DIR__.'/Migrations' => database_path('/migrations')
        ], 'smsmigrations');
    }
}
