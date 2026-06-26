<?php
namespace App\Services;

use App\Repository\Interfaces\BookingServiceInterface;

class BookingService{

    public static function setBookingDetails($request){
        $result = app()->make(BookingServiceInterface::class)->setBookingDetails($request);
        return $result;
    }
}
