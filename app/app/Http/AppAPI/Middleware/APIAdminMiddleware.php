<?php

namespace App\Http\AppAPI\Middleware;

use Closure;
use Domain\Users\Admins\Models\Admin;
use Illuminate\Http\Request;

class APIAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        /** @var \Domain\Users\Admins\Models\Admin $admin */
        $admin = auth()->user();

        if ($admin->tokenCan('admin')) {
            return $next($request);
        }

        return response()->json(['message' => 'Not Authorized'], 401);
    }
}
