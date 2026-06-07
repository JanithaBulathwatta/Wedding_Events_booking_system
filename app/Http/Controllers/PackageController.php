<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PackageController extends Controller
{
    public function loadPackageSection(){

        $serviceTypes = DB::table('service_types')
                    ->get();
        return view('pages.manage-package',compact('serviceTypes'));
    }
}
