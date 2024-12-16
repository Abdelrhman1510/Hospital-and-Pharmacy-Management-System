<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$guard): Response
    {
        if (Auth::guard('admin')->check()) {
            // If admin is authenticated, redirect to the admin dashboard
            return redirect()->route('dashboard.admin');
        }

        if (Auth::guard('web')->check()) {
            // If user is authenticated, redirect to the user dashboard
            return redirect()->route('dashboard.user');
        }
        if (auth('doctor')->check()){
            return redirect('/dashboard/doctor');
        }
        if(auth('ray_employee')->check()){
            return redirect('/dashboard/ray_employee');
        }
        if (auth('laboratorie_employee')->check()){
            return redirect('/dashboard/lab_employee');
        }
        if (auth('patient')->check()){
            return redirect('/dashboard/patient');
        }

        return $next($request);
    }
}
