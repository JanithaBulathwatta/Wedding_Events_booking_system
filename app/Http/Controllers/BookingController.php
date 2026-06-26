<?php

namespace App\Http\Controllers;

use App\Services\BookingService;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function setBookingDetails(Request $request){
        $response = BookingService::setBookingDetails($request);
        return response()->json($response);
    }
}
