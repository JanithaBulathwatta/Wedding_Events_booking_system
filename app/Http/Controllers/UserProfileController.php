<?php

namespace App\Http\Controllers;

use App\Services\UserProfileService;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function loadUserProfile(){
        return view('pages.user-profile');
    }

    public function setUserProfile(Request $request){
        $response = UserProfileService::setUserProfile($request);
        return response()->json($response);
    }
}
