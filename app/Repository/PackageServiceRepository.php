<?php

namespace App\Repository;
use App\Repository\Interfaces\PackageServiceInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PackageServiceRepository implements PackageServiceInterface{

    public function setPackageDetails($request){
        dd($request->all());
        $serviceType = $request->serviceType;
        $PackageName = $request->PackageName;
        $packagePrice = $request->packagePrice;
        $description = $request->description;
        $userId = Auth::id();

        DB::table('packages')->insert([
            "user_id"=>$userId,
            "service_type_id"=>$serviceType,
            "package_name"=>$PackageName,
            "price"=>$packagePrice,
            "description"=>$description,
            "created_at"=>Carbon::now(),
            "upated_at"=>Carbon::now()
        ]);

        return[
            "status"=>200,
            "message"=>"Succuessfully added the package"
        ];
    }

}
