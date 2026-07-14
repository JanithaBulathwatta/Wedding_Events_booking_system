<?php
namespace App\Services;

use App\Repository\Interfaces\PackageServiceInterface;

class PackageService{

    public static function setPackageDetails($request){
        $result = app()->make(PackageServiceInterface::class)->setPackageDetails($request);
        return $result;
    }

    public static function getPackageDetails($request){
        $result = app()->make(PackageServiceInterface::class)->getPackageDetails($request);
        return $result;
    }

    public static function updatePackageDetails($request){
        $result = app()->make(PackageServiceInterface::class)->updatePackageDetails($request);
        return $result;
    }
}
