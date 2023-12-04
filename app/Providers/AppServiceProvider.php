<?php

namespace App\Providers;

use App\Interface\GithubInterface;
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

        $this->app->bind(GithubInterface::class, fn()=> new GithubService(config('services.github.token')));
    }

    /**
     * Bootstrap any application servic
     */
    public function boot(): void
    {
        //
    }
}
