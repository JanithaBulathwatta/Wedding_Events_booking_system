<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProviderController extends Controller
{
    public function loadProviderDashboard(){
        $packageCount = DB::table('packages')
                            ->where('user_id',Auth::id())
                            ->where('record_status',1)
                            ->where('is_active',1)
                            ->count();

        return view('pages.service-provider-dashboard',compact('packageCount'));
    }
}
