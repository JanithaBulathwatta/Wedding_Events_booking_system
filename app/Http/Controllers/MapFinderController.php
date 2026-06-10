<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapFinderController extends Controller
{
    public function loadMap(){
        return view('pages.map-finder');
    }
}
