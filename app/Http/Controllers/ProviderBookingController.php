<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProviderBookingController extends Controller
{
    public function loadProviderBookings(){
        return view('pages.provider-bookings');
    }
}
