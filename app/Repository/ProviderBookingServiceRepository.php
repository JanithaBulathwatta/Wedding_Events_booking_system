<?php
namespace App\Repository;
use App\Repository\Interfaces\ProviderBookingServiceInterface;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\TryCatch;

class ProviderBookingServiceRepository implements ProviderBookingServiceInterface{

    public function setBookingStatus($request){

        try {
            $status  = $request->status;
            $bookingId = $request->bookingId;

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
}
