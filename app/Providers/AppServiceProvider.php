<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Validation\Factory as ValidationFactory;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Tambahkan binding validator jika belum ada
        if (! $this->app->bound('validator')) {
            $this->app->bind('validator', function ($app) {
                return new ValidationFactory($app['translator'], $app);
            });
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Paginator::useBootstrapFive();
    }
}
