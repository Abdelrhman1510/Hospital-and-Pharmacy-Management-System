<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\PatientLoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    public function store(PatientLoginRequest $request)
    {
        if (Auth::guard('patient')->attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->route('dashboard.patient');
        } else {
            \Log::debug('Patient login attempt failed', [
                'email' => $request->input('email'),
                'password' => $request->input('password') // Make sure to remove this in production for security
            ]);
    
            // Redirect back with an error
            return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
        }
    }
    


    public function destroy(Request $request)
    {
        Auth::guard('patient')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
