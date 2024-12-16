<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LaboratorieEmployeeLoginRequest;
use App\Models\CheckIn;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaboratorieEmployeeController extends Controller
{
    public function store(LaboratorieEmployeeLoginRequest $request){
        if (Auth::guard('laboratorie_employee')->attempt($request->only('email', 'password'))) {
            // Regenerate session to prevent session fixation attacks
            $request->session()->regenerate();
            CheckIn::create([
                'user_id' => Auth::guard('laboratorie_employee')->id(),
                'user_type' => 'laboratorie_employee',
                'check_in_at' => now(),
            ]);

            // Redirect to the admin dashboard
            return redirect()->route('dashboard.laboratorie_employee');
        }
        return back()->withErrors(['name' => (trans('Dashboard/auth.failed'))]);

    }

    public function destroy(Request $request)
    {
        $checkIn = CheckIn::where('user_id', Auth::guard('laboratorie_employee')->id())
        ->where('user_type', 'laboratorie_employee')
        ->whereNull('check_out_at')
        ->latest()
        ->first();

    if ($checkIn) {
        $checkIn->update(['check_out_at' => now()]);
    }
        Auth::guard('laboratorie_employee')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
