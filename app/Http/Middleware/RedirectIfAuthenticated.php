<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next, $guard = null)
    {
        if ($guard === 'admin' && Auth::guard($guard)->check()) {
            return redirect('/admin');
        }
        if ($guard === 'writer' && Auth::guard($guard)->check()) {
            return redirect('/writer');
        }
        if ($guard === 'medecin' && Auth::guard($guard)->check()) {
            return redirect('/medecin');
        }
        if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }

        return $next($request);
    }
}
