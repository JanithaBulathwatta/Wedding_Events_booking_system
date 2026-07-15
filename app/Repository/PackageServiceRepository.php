<?php

namespace App\Repository;
use App\Repository\Interfaces\PackageServiceInterface;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PackageServiceRepository implements PackageServiceInterface{

    public function setPackageDetails($request){
        $serviceType = $request->serviceType;
        $PackageType = $request->PackageType;
        $packagePrice = $request->packagePrice;
        $description = $request->description;
        $userId = Auth::id();

        $isAvailable = DB::table('packages')->where('user_id',$userId)
                                            ->where('service_type_id',$serviceType)
                                            ->where('package_type_id',$PackageType)
                                            ->where('record_status',1)
                                            ->exists();
        if($isAvailable){
            return[
                "status"=>400,
                "message"=>"This Package is Already Exists"
            ];
        }

        DB::table('packages')->insert([
            "user_id"=>$userId,
            "service_type_id"=>$serviceType,
            "package_type_id"=>$PackageType,
            "price"=>$packagePrice,
            "description"=>$description,
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now()
        ]);

        return[
            "status"=>200,
            "message"=>"Succuessfully added the package"
        ];
    }

    public function getPackageDetails($request){
        $userId = Auth::id();

        $packages = DB::table('packages')
                            ->join('service_types', 'packages.service_type_id', '=', 'service_types.id')
                            ->join('package_type', 'packages.package_type_id', '=', 'package_type.id')
                            ->select(
                                'packages.*',
                                'service_types.display_name_si as service_type_name',
                                'package_type.name as package_type_name'
                            )
                            ->where('packages.user_id', $userId)
                            ->where('packages.record_status', 1)
                            ->where('service_types.record_status',1)
                            ->where('package_type.record_status',1)
                            ->get();
        return[
            "status"=>200,
            "resultSet"=>$packages
        ];
    }

    public function updatePackageDetails($request){
        
        $serviceType = $request->serviceType;
        $packageType = $request->packageType;
        $price = $request->price;
        $description = $request->description;
        $packageId = $request->packageId;

        try {
            DB::table('packages')
                    ->where('id',$packageId)
                    ->update([
                        "service_type_id"=>$serviceType,
                        "package_type_id"=>$packageType,
                        "price"=>$price,
                        "description"=>$description,
                        "updated_at"=>Carbon::now()
                    ]);
            return[
                "status"=>200,
                "message"=>"Succuessfully Update the Package"
            ];

        } catch (Exception $e) {
            Log::error("package update error: ",$e->getMessage());

            return[
                "status"=>400,
                "message"=>"Update Process Failed"
            ];
        }
    }

}
