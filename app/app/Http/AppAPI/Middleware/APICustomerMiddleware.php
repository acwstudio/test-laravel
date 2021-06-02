<?php

namespace App\Http\AppAPI\Middleware;

use Closure;
use Domain\Customers\Models\Customer;
use Illuminate\Http\Request;

class APICustomerMiddleware
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
        /** @var Customer $customer */
        $customer = auth()->user();

        if ($customer->tokenCan('customer')) {
            return $next($request);
        }

        return response()->json(['message' => 'Not Authorized'], 401);
    }
}
