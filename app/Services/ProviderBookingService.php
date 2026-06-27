<?php
namespace App\Services;

use App\Repository\Interfaces\ProviderBookingServiceInterface;

class ProviderBookingService{

    public static function setBookingStatus($request){
        $result = app()->make(ProviderBookingServiceInterface::class)->setBookingStatus($request);
        return $result;
    }

}
