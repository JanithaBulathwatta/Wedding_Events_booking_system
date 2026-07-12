<?php
namespace App\Repository;
use App\Repository\Interfaces\ProviderBookingServiceInterface;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\TryCatch;

class ProviderBookingServiceRepository implements ProviderBookingServiceInterface{

    public function setBookingStatus($request){

        try {
            $status  = $request->status;
            $bookingId = $request->bookingId;
            $currentDate = today()->format('Y-m-d');

            $bookingDate = DB::table('bookings')->where('id',$bookingId)->value('booking_date');

            if($status == 2 && $bookingDate > $currentDate ){
                return[
                    "status"=>400,
                    "message"=>"You can not complete the task before the booked date come"
                ];
            }

            DB::table('bookings')
                ->where('id',$bookingId)
                ->update([
                    "status"=> $status,
                    "updated_at"=>Carbon::now()
                ]);

            return[
                "status"=>200,
                "message"=>"updated"
            ];
        } catch (Exception $e) {

            Log::error("status updated error : ".$e->getMessage());

            return[
                "status"=>400,
                "message"=>"Something went wrong!"
            ];
        }
    }

     public function getBookingDates($request){
        $providerId = Auth::id();

        try {
            $bookingDates = DB::table('bookings')
                        ->select('booking_date')
                        ->where('provider_id',$providerId)
                        ->where('record_status',1)
                        ->whereIn('status',[0,1])
                        ->get();
            return[
                "status"=>200,
                "dataSet"=>$bookingDates
            ];
        } catch (Exception $e) {
            Log::error('get booked dates arror: ',$e->getMessage());

            return[
                "status"=>400,
                "message"=>"Fetch booking dates failed"
            ];

        }
     }
}
