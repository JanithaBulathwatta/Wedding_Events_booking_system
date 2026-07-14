<?php

namespace App\Http\Controllers;

use App\Services\PackageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PackageController extends Controller
{
    public function loadPackageSection(){

        $serviceTypes = DB::table('service_types')
                            ->get();

        $packageTypes = DB::table('package_type')
                            ->get();

        return view('pages.manage-package',compact('serviceTypes','packageTypes'));
    }
    public function setPackageDetails(Request $request){
        $response = PackageService::setPackageDetails($request);
        return response()->json($response);
    }

    public function getPackageDetails(Request $request){
        $response = PackageService::getPackageDetails($request);
        return response()->json($response);
    }

    public function updatePackageDetails(Request $request){
        $response = PackageService::updatePackageDetails($request);
        return response()->json($response);
    }

}
