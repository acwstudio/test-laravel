<?php

namespace App\Http\AppAPI\Middleware;

use Closure;
use Domain\Customers\Models\Customer;
use Domain\Users\Employers\Models\Employer;
use Illuminate\Http\Request;

class APIEmployerMiddleware
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
        /** @var Employer $employer */
        $employer = auth()->user();

        if ($employer->tokenCan('employer')) {
            return $next($request);
        }

        return response()->json(['message' => 'Not Authorized'], 401);
    }
}
