<?php

namespace App\Providers;

use App\Repository\Interfaces\UserProfileServiceInterface;
use App\Repository\UserProfileServiceRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserProfileServiceInterface::class,UserProfileServiceRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
