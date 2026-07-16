<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function loadCustomerDashboard(Request $request)
    {
        $resultSQL = "select sp.city,
                             sp.profile_picture,
                             sp.cover_image,
                             sp.group_name,
                             up.full_name as name,
                             up.mobile,
                             u.id,
                             GROUP_CONCAT(DISTINCT b.booking_date) as dates,
                             GROUP_CONCAT(p.price) as prices,
                             GROUP_CONCAT(p.description) as descriptions,
                             GROUP_CONCAT(DISTINCT st.display_name_si) as services,
                             GROUP_CONCAT(pt.name) as package_names
                      from service_provider_details sp
                      inner join user_profile up on sp.user_id = up.user_id
                      inner join users u on u.id = sp.user_id and u.id = up.user_id
                      inner join packages p on p.user_id = u.id
                      inner join package_type pt on p.package_type_id = pt.id
                      inner join service_types st on p.service_type_id = st.id
                      left join bookings b on u.id = b.provider_id and b.record_status = 1 and b.status = 1
                      where u.is_provider = 1
                      and u.record_status  = 1
                      and sp.record_status  = 1
                      and up.record_status  = 1
                      and p.record_status  = 1
                      and st.record_status  = 1
                      and pt.record_status  = 1";

        $bindings = [];

        if ($request->filled('search')) {
            $resultSQL .= " and (up.full_name LIKE :search or sp.group_name LIKE :search_group)";
            $bindings['search'] = '%' . $request->search . '%';
            $bindings['search_group'] = '%' . $request->search . '%';
        }

        if ($request->filled('category_id')) {
            $resultSQL .= " and p.service_type_id = :category_id";
            $bindings['category_id'] = $request->category_id;
        }

        if ($request->filled('district_id')) {
            $resultSQL .= " and sp.district_id = :district_id";
            $bindings['district_id'] = $request->district_id;
        }

        $resultSQL .= " GROUP BY u.id, sp.city, sp.profile_picture, up.full_name, up.mobile, sp.cover_image, sp.group_name";

        $providers = DB::select($resultSQL, $bindings);

        if ($request->ajax()) {
            return view('partials.providers_list', compact('providers'))->render();
        }

        $districts = DB::table('districts')->select('id', 'name')->get();
        $serviceTypes = DB::table('service_types')->select('id', 'display_name_si')->get();

        return view('pages.customer-dashboard', compact('providers', 'districts', 'serviceTypes'));
    }
}
