<?php

namespace Obiefy\Tookan;

use Illuminate\Support\ServiceProvider;

class TookanServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('tookan', TookanHttp::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/tookan.php' => config_path('tookan..php')
        ], 'tookan-config');
    }
}
