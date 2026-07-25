<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class WebAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::guard('customer')->guest() && Auth::guard('customer')->user()->role_id==3)
        {
            return $next($request);
        }
        else
        {
            return redirect()->route('home')->with('error_message',"Please Login");
        }
    }
}
