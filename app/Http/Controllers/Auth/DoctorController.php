<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorLoginRequest;
use App\Models\CheckIn;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    public function store(DoctorLoginRequest $request)
    { if (\Illuminate\Support\Facades\Auth::guard('doctor')->attempt($request->only('email', 'password'))) {
        // Regenerate session to prevent session fixation attacks
        $request->session()->regenerate();
        CheckIn::create([
            'user_id' => Auth::guard('doctor')->id(),
            'user_type' => 'doctor',
            'check_in_at' => now(),
        ]);
        // Redirect to the admin dashboard
        return redirect()->route('dashboard.doctor');
    }

    // If authentication fails, redirect back with an error message
    return back()->withErrors(['name' => (trans('Dashboard/auth.failed'))]);
    }


    public function destroy(Request $request)
    {
        $checkIn = CheckIn::where('user_id', Auth::guard('doctor')->id())
        ->where('user_type', 'doctor')
        ->whereNull('check_out_at')
        ->latest()
        ->first();

    if ($checkIn) {
        $checkIn->update(['check_out_at' => now()]);
    }
        Auth::guard('doctor')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
