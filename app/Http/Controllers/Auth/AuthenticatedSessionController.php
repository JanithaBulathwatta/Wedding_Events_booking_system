<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $request->session()->forget('url.intended');

        $isExistsCus = DB::table('user_profile')->where('user_id',$request->user()->id)->exists();
        $isExistsPro = DB::table('service_provider_details')->where('user_id',$request->user()->id)->exists();

        if(!$isExistsCus || !$isExistsPro){
            return redirect()->route('userProfile.show');
        }

        if($request->user()->is_provider == 1){
            return redirect()->route('provider.dashboard');
        }
        // elseif($request->user()->is_admin == 1){
        //     return redirect()->route('provider.dashboard');
        // }
        return redirect()->route('customer.dashboard');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
