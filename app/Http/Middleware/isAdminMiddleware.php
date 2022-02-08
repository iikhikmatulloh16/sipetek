<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class isAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // if (Auth::check() && Auth::user()->role == 1) {
        //     return $next($request);
        // }else {
        //     return redirect()->route('login');
        // }

        if (Auth::check() && Auth::user()->role == 1) {
            return $next($request);
        }elseif (Auth::check() && Auth::user()->role == 3) {
            return $next($request);
        }
        return redirect()->route('login');
    }
}