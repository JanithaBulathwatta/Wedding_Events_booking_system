<?php
namespace App\Repository\Interfaces;
interface ProviderBookingServiceInterface{

    public function setBookingStatus($request);
     public function getBookingDates($request);
}

