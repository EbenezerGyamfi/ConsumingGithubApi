<?php

namespace App\Providers;

use App\Interface\PaystackInterface;
use App\Services\PaystackService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //

        $this->app->bind(
            PaystackInterface::class,
            fn() : PaystackService => new PaystackService(config('services.paystack.secret'))
        );
    }
}
