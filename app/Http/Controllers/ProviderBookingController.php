<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProviderBookingController extends Controller
{
    public function loadProviderBookings(){

        $bookingSQL = "select up.full_name,
                              up.mobile,
                              up.address,
                              b.services,
                              b.total_price,
                              b.booking_data
                              from bookings b
                              inner join user_profile up on up.user_id = b.customer_id
                              inner join users u on u.id = b.customer_id
                              where u.is_customer = 1
                              and up.record_status = 1
                              and b.record_status = 1
                              and u.record_status = 1";
        
        return view('pages.provider-bookings');
    }
}
