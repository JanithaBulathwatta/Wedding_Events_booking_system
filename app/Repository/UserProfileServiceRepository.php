<?php
namespace App\Repository;
use App\Repository\Interfaces\UserProfileServiceInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserProfileServiceRepository implements UserProfileServiceInterface{

    public function setUserProfile($request){

        $fullName = $request->fullName;
        $address = $request->address;
        $mobile = $request->mobile;
        $category = $request->category;
        $area = $request->serviceArea;
        $userId = Auth::id();

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
                    "category_id" => $category,
                    "service_area"=> $area,
                    "user_id" => $userId,
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
