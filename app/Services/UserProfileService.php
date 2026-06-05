<?php
namespace App\Services;

use App\Repository\Interfaces\UserProfileServiceInterface;

class UserProfileService{

    public static function setUserProfile($request){
        $result = app()->make(UserProfileServiceInterface::class)->setUserProfile($request);
        return $result;
    }

}
