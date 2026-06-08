<?php

namespace App\Providers;

use App\Repository\Interfaces\PackageServiceInterface;
use App\Repository\Interfaces\UserProfileServiceInterface;
use App\Repository\PackageServiceRepository;
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
        $this->app->bind(PackageServiceInterface::class,PackageServiceRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
