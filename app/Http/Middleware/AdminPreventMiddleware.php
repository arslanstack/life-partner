<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminPreventMiddleware
{
    public function handle($request, Closure $next)
    {
        // If an admin is authenticated, prevent access to regular user routes
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin/home');
        }
        else if (Auth::guard('web')->check()) {
            return redirect()->route('home');
        }

        return $next($request);
    }
}