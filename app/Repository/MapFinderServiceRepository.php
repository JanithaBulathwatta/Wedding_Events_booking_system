<?php
namespace App\Repository;
use App\Repository\Interfaces\MapFinderServiceInterface;
use Illuminate\Support\Facades\DB;

class MapFinderServiceRepository implements MapFinderServiceInterface{

    public function getLocationDetails($request){

        $resultSQL = "select up.full_name as name,
                             up.mobile,
                             sp.city,
                             sp.latitude,
                             sp.longitude,
                             u.id
                             from user_profile up
                             inner join service_provider_details sp on up.user_id = sp.user_id
                             inner join users u on u.id = sp.user_id and u.id = up.user_id
                             where u.record_status = 1
                             and u.is_provider = 1
                             and sp.record_status = 1
                             and up.record_status = 1";

        $resultSet = DB::select($resultSQL);

        return[
            "status"=>200,
            "dataSet"=>$resultSet
        ];
    }
}
