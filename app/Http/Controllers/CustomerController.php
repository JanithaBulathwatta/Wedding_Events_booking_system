<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function loadCustomerDashboard(){
        $resultSQL = "select sp.city,
                             sp.profile_picture,
                             up.full_name as name,
                             up.mobile,
                             p.price,
                             st.display_name_si as service,
                             pt.name as package_name
                             from service_provider_details sp
                             inner join user_profile up on sp.user_id = up.user_id
                             inner join users u on u.id = sp.user_id and u.id = up.user_id
                             inner join packages p on p.user_id = u.id
                             inner join package_type pt on p.package_type_id = pt.id
                             inner join service_types st on p.service_type_id = st.id
                             where u.is_provider = 1
                             and u.record_status  = 1
                             and sp.record_status  = 1
                             and up.record_status  = 1
                             and p.record_status  = 1
                             and st.record_status  = 1
                             and pt.record_status  = 1";

        $providers = DB::select($resultSQL);
        
        return view('pages.customer-dashboard',compact('providers'));
    }
}
