<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CustomerAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('admin')->check()) {
            return redirect('/admin/myprofile');
        }

        if (Auth::guard('customer')->check() || Auth::guard('web')->guest()) {
            return $next($request);
        }
    
        if (Auth::guard('courier')->check()) {
            return redirect('/courier');
        }
        return $next($request);
    }
}
