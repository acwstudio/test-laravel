<?php


namespace Domain\Users\Admins\Actions;

use Domain\Users\Admins\Models\Admin;
use Illuminate\Http\JsonResponse;
use function auth;
use function response;

class AdminUserLogoutAction
{
    /**
     * @return JsonResponse
     */
    public function execute(): JsonResponse
    {
        /** @var Admin $admin */
        $admin = auth()->user();

        $admin->tokens()->delete();

        return response()->json(null, 204);
    }
}
