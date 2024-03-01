<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (request()->getHost() == 'customer.topsidefacilities.test') {
            return $request->expectsJson() ? null : route('customerlogin');
        }
        return $request->expectsJson() ? null : route('adminlogin');

    }
}
