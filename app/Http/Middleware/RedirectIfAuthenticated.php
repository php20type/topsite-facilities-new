<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
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
    public function handle(Request $request, Closure $next, $guards = null): Response
    {
        if ($guards == "admin" && Auth::guard($guards)->check()) {
            return redirect()->route('admin.customer.index');
        } elseif ($guards == "user" && Auth::guard($guards)->check()) {
            if (Auth::guard($guards)->user()->email_verified_at !== null) {
                return redirect()->route('user.property.index');
            } else {
                return redirect('/thank-you');
            }
        } elseif (Auth::guard($guards)->check()) {
            return redirect('/home');
        }

        // If none of the conditions are met, continue with the request
        return $next($request);

        // $guards = empty($guards) ? [null] : $guards;

        // foreach ($guards as $guard) {
        //     if (Auth::guard($guard)->check()) {
        //         return redirect(RouteServiceProvider::HOME);
        //     }
        // }

        // return $next($request);
    }
}
