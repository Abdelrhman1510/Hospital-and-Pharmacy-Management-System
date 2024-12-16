<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\PharmacyEmployeeLoginRequest;
use App\Models\CheckIn;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PharmacyEmployeeController extends Controller
{

    public function store(Request $request){
        if (Auth::guard('pharmacy_employee')->attempt($request->only('email', 'password'))) {
            // Regenerate session to prevent session fixation attacks
            $request->session()->regenerate();
            CheckIn::create([
                'user_id' => Auth::guard('pharmacy_employee')->id(),
                'user_type' => 'pharmacy_employee',
                'check_in_at' => now(),
            ]);

            // Redirect to the admin dashboard
            return redirect()->route('dashboard.pharmacy_employee');
        }

        // If authentication fails, redirect back with an error message
        return back()->withErrors(['name' => (trans('Dashboard/auth.failed'))]);

}

    public function destroy(Request $request)
    {
        $checkIn = CheckIn::where('user_id', Auth::guard('pharmacy_employee')->id())
        ->where('user_type', 'pharmacy_employee')
        ->whereNull('check_out_at')
        ->latest()
        ->first();

    if ($checkIn) {
        $checkIn->update(['check_out_at' => now()]);
    }
        Auth::guard('pharmacy_employee')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }//
}
