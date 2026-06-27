<?php

namespace App\Http\Controllers;

use App\Services\ProviderBookingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProviderBookingController extends Controller
{
    public function loadProviderBookings(){

        $providerId = Auth::id();

        $bookingSQL = "select up.full_name,
                              up.mobile,
                              up.address,
                              b.services,
                              b.id,
                              b.total_price,
                              b.booking_date,
                              b.status
                              from bookings b
                              inner join user_profile up on up.user_id = b.customer_id
                              inner join users u on u.id = b.customer_id
                              where u.is_customer = 1
                              and b.provider_id = '$providerId'
                              and up.record_status = 1
                              and b.record_status = 1
                              and u.record_status = 1";

        $bookings = DB::select($bookingSQL);

        return view('pages.provider-bookings',compact('bookings'));
    }

    public function setBookingStatus(Request $request){
        dd($request->all());
        $response = ProviderBookingService::setBookingStatus($request);
        return response()->json($response);
    }
}
