<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check() && auth()->user()->hasRole('admin') == 1) {
             return redirect('/admin');

        }
        if (Auth::guard($guard)->check() && auth()->user()->hasRole('teacher') == 1) {
            return redirect('/teacher');

       }
       if (Auth::guard($guard)->check() && auth()->user()->hasRole('student') == 1) {
        return redirect('/student');

        }

        return $next($request);
    }
}
