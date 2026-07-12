<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerBookingController extends Controller
{
    public function loadCustomerBookings(){
        $customerId = Auth::id();
        $bookingSQL = "select b.services,
                              b.total_price,
                              b.booking_date,
                              b.status,
                              b.id,
                              up.full_name
                              from bookings b
                              left join user_profile up on b.provider_id = up.user_id and up.record_status = 1
                              left join users u on b.provider_id = u.id and u.record_status = 1
                              where b.record_status = 1
                              and b.customer_id = '$customerId'";

        $bookings = DB::select($bookingSQL);

        return view('pages.customer-booking',compact('bookings'));
    }
}
