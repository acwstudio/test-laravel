<?php


namespace App\Http\AppAPI\Middleware;

use Closure;
use Illuminate\Http\Request;

class APIApplicantMiddleware
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
        if ($request->user()->tokenCan("applicant")) {
            return $next($request);
        }

        return response()->json(['message' => 'Not Authorized Applicant'], 401);
    }
}
