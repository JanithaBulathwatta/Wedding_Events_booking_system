<?php
namespace App\Services;

use App\Repository\Interfaces\ProviderBookingServiceInterface;

class ProviderBookingService{

    public static function setBookingStatus($request){
        $result = app()->make(ProviderBookingServiceInterface::class)->setBookingStatus($request);
        return $result;
    }

    public static function getBookingDates($request){
        $result = app()->make(ProviderBookingServiceInterface::class)->getBookingDates($request);
        return $result;
    }

}
