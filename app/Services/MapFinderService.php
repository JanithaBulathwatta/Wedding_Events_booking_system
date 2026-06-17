<?php

namespace App\Services;

use App\Repository\Interfaces\MapFinderServiceInterface;

class MapFinderService{

    public static function getLocationDetails($request){
        $result = app()->make(MapFinderServiceInterface::class)->getLocationDetails($request);
        return $result;
    }

}
