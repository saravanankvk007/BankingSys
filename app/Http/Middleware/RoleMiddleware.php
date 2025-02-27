<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;


class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
       //121 return $next($request);
	    if(Auth::check() && Auth::user()->role == $role)
        {
            return $next($request);
        }
        
        return response()->json(['You do not have permission to access for this page.']);
    }
}
