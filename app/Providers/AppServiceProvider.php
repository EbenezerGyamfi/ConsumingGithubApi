<?php

namespace App\Providers;

use App\Interface\GithubInterface;
use App\Service\GithubService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //

        $this->app->bind(GithubInterface::class, fn()=> new GithubService(config('services.github_token.token')));
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
