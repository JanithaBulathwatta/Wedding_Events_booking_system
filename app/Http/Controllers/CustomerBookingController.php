<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerBookingController extends Controller
{
    public function loadCustomerBookings(){
        return view('pages.customer-booking');
    }
}
