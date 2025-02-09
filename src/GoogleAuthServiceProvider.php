<?php

namespace Tazz\GoogleAuthManager;

use Illuminate\Support\ServiceProvider;
use Tazz\GoogleAuthManager\Services\GoogleAuthService;

class GoogleAuthServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/google-auth.php', 'google-auth'
        );

        $this->app->singleton('google-auth', function ($app) {
            return new GoogleAuthService(config('google-auth'));
        });
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/google-auth.php' => config_path('google-auth.php'),
        ], 'google-auth-config');
    }
}