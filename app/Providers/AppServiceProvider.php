<?php

namespace App\Providers;

use App\Interfaces\GithubInterface;
use App\Services\GithubService;
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
            GithubInterface::class,
            fn(): GithubInterface => new GithubService(config('services.github.token'))
        );
    }
}
