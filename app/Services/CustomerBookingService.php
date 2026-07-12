<?php
namespace App\Services;

use App\Repository\Interfaces\CustomerBookingServiceInterface;

class CustomerBookingService{
    public static function setBookingStatus($request){
        $result = app()->make(CustomerBookingServiceInterface::class)->setBookingStatus($request);
        return $result;
    }
}
