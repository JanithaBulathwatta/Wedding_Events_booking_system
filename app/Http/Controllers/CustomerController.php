<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function loadCustomerDashboard(){
        return view('pages.customer-dashboard');
    }
}
