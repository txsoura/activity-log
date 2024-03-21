<?php

namespace Txsoura\ActivityLog\Providers;

use Illuminate\Support\ServiceProvider;

class ActivityLogServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/activitylog.php', 'activitylog');
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {

            $this->publishes([
                __DIR__.'/../../config/activitylog.php' => config_path('activitylog.php'),
            ], 'laravel-assets');

        }

        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

        $this->publishes([
            __DIR__.'/../../database/migrations/' => database_path('migrations')
        ], 'laravel-assets');
    }
}
