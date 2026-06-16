<?php
namespace App\Repository;
use App\Repository\Interfaces\UserProfileServiceInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class UserProfileServiceRepository implements UserProfileServiceInterface{

    public function setUserProfile($request){

        $fullName = $request->txtFullName;
        $address = $request->txtAddress;
        $mobile = $request->txtMobile;
        $district = $request->cmbDistrict;
        $city = $request->txtCity;
        $profile_type = $request->profile_type;
        $groupName = $request->txtGroupName;
        $imagePath = $request->file('fileProfilePic')->store('profile','public');
        $userId = Auth::id();
        $districtName = DB::table('districts')->where('id',$district)->value('name');

        $providerLocation = "{$city},{$districtName},Sri Lanka";

        $response = Http::withHeaders([
            'User-Agent' => 'Ashtaka/1.0 (janithabulathwatta04@gmail.com)'
        ])
        ->timeout(15)
        ->withoutVerifying()
        ->get('https://nominatim.openstreetmap.org/search', [
            'q' => $providerLocation,
            'format' => 'json',
            'limit' => 1
        ]);
        //dd($response);
        $latitude = null;
        $longitude = null;

        if ($response->successful() && isset($response->json()[0])) {
            $latitude = $response->json()[0]['lat'];
            $longitude = $response->json()[0]['lon'];
        }
        //dd($longitude);


        $user = DB::table('users')
                    ->where('id',$userId)
                    ->first();

        if($user && $user->is_provider == 1){
            DB::table('user_profile')
                ->insert([
                    "full_name" =>$fullName,
                    "mobile" => $mobile,
                    "address" => $address,
                    "user_id" => $userId,
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now()
                ]);
            DB::table('service_provider_details')
                ->insert([
                    "user_id" => $userId,
                    "city" => $city,
                    "latitude" => $latitude,
                    "longitude" => $longitude,
                    "profile_type" => $profile_type,
                    "group_name" => $groupName,
                    "profile_picture" => $imagePath,
                    "district_id" => $district,
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now()
                ]);

            $redirectUrl = route('provider.dashboard');

        }else{
            DB::table('user_profile')
                ->insert([
                    "full_name" =>$fullName,
                    "mobile" => $mobile,
                    "address" => $address,
                    "user_id" => $userId,
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now()
                ]);

            $redirectUrl = route('customer.dashboard');
        }

        return[
            "status"=>200,
            "message"=>"you are succesfully Registered",
            "redirect"=>$redirectUrl
        ];
    }
}
