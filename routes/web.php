<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

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

    //customer routes
    Route::get('/get-customer-dashboard',[CustomerController::class,'loadCustomerDashboard'])->name('customer.dashboard');

    //provider routes
    Route::get('/get-provider-dashboard',[ProviderController::class,'loadProviderDashboard'])->name('provider.dashboard');

    //package routes
    Route::get('/get-package-section',[PackageController::class,'loadPackageSection'])->name('package.show');
    Route::post('/set-package-details',[PackageController::class,'setPackageDetails']);
});


require __DIR__.'/auth.php';
