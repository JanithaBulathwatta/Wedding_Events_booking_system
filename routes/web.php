<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CustomerBookingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MapFinderController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProviderBookingController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

//customer routes
    Route::get('/',[CustomerController::class,'loadCustomerDashboard'])->name('customer.dashboard');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //user profile routes
    Route::get('/get-user-profile',[UserProfileController::class,'loadUserProfile'])->name('userProfile.show');
    Route::post('/set-user-profile',[UserProfileController::class,'setUserProfile']);


    //provider routes
    Route::get('/get-provider-dashboard',[ProviderController::class,'loadProviderDashboard'])->name('provider.dashboard');

    //package routes
    Route::get('/get-package-section',[PackageController::class,'loadPackageSection'])->name('package.show');
    Route::post('/set-package-details',[PackageController::class,'setPackageDetails']);
    Route::get('/get-package-details',[PackageController::class,'getPackageDetails']);

    //service provider dashboard routes
    Route::get('/get-package-details',[PackageController::class,'getPackageDetails']);

    //map
    Route::get('/get-map-details',[MapFinderController::class,'loadMap'])->name('map.show');
    Route::get('/get-provider-location-details',[MapFinderController::class,'getLocationDetails']);

    //booking
    Route::post('/set-booking-details',[BookingController::class,'setBookingDetails']);

    //provider-bookings
    Route::get('/get-provider-bookings',[ProviderBookingController::class,'loadProviderBookings'])->name('booking.show');
    Route::post('/set-booking-status',[ProviderBookingController::class,'setBookingStatus']);
    Route::get('/get-booking-dates',[ProviderBookingController::class,'getBookingDates']);

    //customer bookings
    Route::get('/get-customer-bookings',[CustomerBookingController::class,'loadCustomerBookings'])->name('customerBooking.show');
    Route::post('/set-customer-booking-status',[CustomerBookingController::class,'setBookingStatus']);
});


require __DIR__.'/auth.php';
