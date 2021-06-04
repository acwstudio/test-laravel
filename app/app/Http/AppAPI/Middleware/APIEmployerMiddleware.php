<?php

namespace App\Http\AppAPI\Middleware;

use Closure;
use Illuminate\Http\Request;

class APIEmployerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        if ($request->user()->tokenCan("employer")) {
            return $next($request);
        }

        return response()->json(['message' => 'Not Authorized Employer'], 401);
    }
}
