<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function loadPackageSection(){
        return view('pages.manage-package');
    }
}
