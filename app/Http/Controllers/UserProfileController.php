<?php

namespace App\Http\Controllers;

use App\Services\UserProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\table;

class UserProfileController extends Controller
{
    public function loadUserProfile(){
        $user = DB::table('users')
                    ->where('id',Auth::id())
                    ->first();
        return view('pages.user-profile',compact('user'));
    }

    public function setUserProfile(Request $request){
        
        $response = UserProfileService::setUserProfile($request);
        return response()->json($response);
    }
}
