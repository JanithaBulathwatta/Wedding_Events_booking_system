<?php

namespace App\Providers;

use App\Repository\BookingServiceRepository;
use App\Repository\Interfaces\BookingServiceInterface;
use App\Repository\Interfaces\MapFinderServiceInterface;
use App\Repository\Interfaces\PackageServiceInterface;
use App\Repository\Interfaces\ProviderBookingServiceInterface;
use App\Repository\Interfaces\UserProfileServiceInterface;
use App\Repository\MapFinderServiceRepository;
use App\Repository\PackageServiceRepository;
use App\Repository\ProviderBookingServiceRepository;
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
        $this->app->bind(MapFinderServiceInterface::class,MapFinderServiceRepository::class);
        $this->app->bind(BookingServiceInterface::class,BookingServiceRepository::class);
        $this->app->bind(ProviderBookingServiceInterface::class,ProviderBookingServiceRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
