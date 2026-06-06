<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function loadProviderDashboard(){
        return view('pages.service-provider-dashboard');
    }
}
