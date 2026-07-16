<?php
namespace App\Repository;

use App\Mail\BookingAccesptedMail;
use App\Repository\Interfaces\ProviderBookingServiceInterface;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
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
            if($status == 1){
                $booking = DB::table('bookings as b')
                                ->join('user_profile as customer_prof', 'b.customer_id', '=', 'customer_prof.user_id')
                                ->join('service_provider_details as provider_det', 'b.provider_id', '=', 'provider_det.user_id')
                                ->join('user_profile as provider_prof', 'b.provider_id', '=', 'provider_prof.user_id')
                                ->select(
                                    'b.id as booking_id',
                                    'b.booking_date',
                                    'b.services',
                                    'b.customer_id',
                                    'customer_prof.full_name as customer_name',
                                    'provider_det.group_name as provider_group_name',
                                    'provider_prof.full_name as provider_real_name'
                                )
                                ->where('b.id', $bookingId)
                                ->where('b.record_status', 1)
                                ->first();



                if($booking){
                    $providerName = $booking->provider_group_name ?? $booking->provider_real_name;

                    $servicesArray = json_decode($booking->services, true);

                    $bookingData = [
                        "customer_name" => $booking->customer_name,
                        "provider_name" => $providerName,
                        "booking_date"  => $booking->booking_date,
                        "services"      => $servicesArray
                    ];

                    $customerEmail = DB::table('users')->where('id', $booking->customer_id)->value('email');

                    if ($customerEmail) {
                        Mail::to($customerEmail)->send(new BookingAccesptedMail($bookingData));
                    }
                }

            }

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
