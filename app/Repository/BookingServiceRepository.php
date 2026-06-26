<?php
namespace App\Repository;
use App\Repository\Interfaces\BookingServiceInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingServiceRepository implements BookingServiceInterface{

    public function setBookingDetails($request){

        $providerId = $request->providerId;
        $totalPrice = $request->totalPrice;
        $bookingDate = $request->bookingDate;
        $services = json_encode($request->selectedList);
        $customerId = Auth::id();

        $isbooking = DB::table('bookings')->where('provider_id',$providerId)
                                         ->where('booking_date',$bookingDate)
                                         ->where('record_status',1)
                                         ->exists();

        if($isbooking){
            return[
                "status"=>400,
                "message"=>"Date Already Booked"
            ];
        }

        DB::table('bookings')->insert([
            "customer_id" => $customerId,
            "provider_id" => $providerId,
            "services"  => $services,
            "total_price" => $totalPrice,
            "booking_date" => $bookingDate,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);

        return[
            "status"=>200,
            "message"=>"Booking Successfull"
        ];
    }

}
