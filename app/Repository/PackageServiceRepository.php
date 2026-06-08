<?php

namespace App\Repository;
use App\Repository\Interfaces\PackageServiceInterface;

class PackageServiceRepository implements PackageServiceInterface{

    public function setPackageDetails($request){
        dd($request->all());
        
    }

}
