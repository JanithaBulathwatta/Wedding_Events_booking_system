<?php
namespace App\Repository;
use App\Repository\Interfaces\CustomerBookingServiceInterface;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CustomerBookingServiceRepository implements CustomerBookingServiceInterface{

    public function setBookingStatus($request){
        $bookingId = $request->bookingId;
        $customerId = Auth::id();

        try {
            DB::table('bookings')
                ->where('id',$bookingId)
                ->where('customer_id',$customerId)
                ->update([
                    "record_status"=>0,
                    "updated_at"=>Carbon::now()
                ]);

            return[
                "status"=>200,
                "message"=>'Booking Request Canceled'
            ];
        } catch (Exception $e) {
            Log::error('booking request cancellation error: ',$e->getMessage());

            return[
                "status"=>400,
                "message"=>'Request Cancellation Faild'
            ];
        }
    }
}
