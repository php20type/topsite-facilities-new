<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckDomain
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $host = $request->getHost();

        if ($host === 'customer.topsidefacilities.test') {
            // Perform actions specific to the customer domain
        } elseif ($host === 'admin.topsidefacilities.test') {
            // Perform actions specific to the admin domain
        }

        return $next($request);
    }
}
