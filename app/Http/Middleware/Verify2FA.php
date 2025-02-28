<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Verify2FA
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
		// Not authenticated => no need to check
        if (!Auth::check()) {
            return $next($request);
        }

        // 2FA not enabled => no need to check
        if (is_null(Auth::user()->google2fa_secret)) {
            return $next($request);
        }

        // 2FA is already checked
        if (session("2fa_checked", false)) {
            return $next($request);
        }

        // at this point user must provide a valid OTP
        // but we must avoid an infinite loop
        if (request()->is('login/twofaotp')) {
            return $next($request);
        }

        return redirect(action("Auth\OTPController@show"));
		
        return $next($request);
    }
}
