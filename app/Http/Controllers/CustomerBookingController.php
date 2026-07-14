<?php

namespace App\Http\Controllers;

use App\Services\CustomerBookingService;
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
                              COALESCE(spd.group_name, up.full_name) AS display_name
                              from bookings b
                              left join user_profile up on b.provider_id = up.user_id and up.record_status = 1
                              left join users u on b.provider_id = u.id and u.record_status = 1
                              LEFT JOIN service_provider_details spd ON b.provider_id = spd.user_id AND spd.record_status = 1
                              where b.record_status = 1
                              and b.customer_id = '$customerId'";

        $bookings = DB::select($bookingSQL);

        return view('pages.customer-booking',compact('bookings'));
    }

    public function setBookingStatus(Request $request){
        $response = CustomerBookingService::setBookingStatus($request);
        return response()->json($response);
    }
}
