<?php

namespace NguyenHuy\Delhivery;

use Illuminate\Support\ServiceProvider;

class DelhiveryServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/delhivery.php' => config_path('delhivery.php'),
            ], 'config');
        }
    }

    public function register()
    {
        $this->app->alias(DelhiveryApi::class, 'delhivery');
        $this->mergeConfigFrom(__DIR__ . '/../config/delhivery.php', 'delhivery');
    }
}
