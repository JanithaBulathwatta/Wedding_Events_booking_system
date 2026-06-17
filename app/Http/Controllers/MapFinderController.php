<?php

namespace App\Http\Controllers;

use App\Services\MapFinderService;
use Illuminate\Http\Request;

class MapFinderController extends Controller
{
    public function loadMap(){
        return view('pages.map-finder');
    }

    public function getLocationDetails(Request $request){
        $response = MapFinderService::getLocationDetails($request);
        return response()->json($response);
    }
}
