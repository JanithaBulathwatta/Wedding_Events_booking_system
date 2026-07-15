<?php
namespace App\Repository\Interfaces;

interface PackageServiceInterface{

    public function setPackageDetails($request);
    public function getPackageDetails($request);
    public function updatePackageDetails($request);
    public function setDeletePackage($request);

}
