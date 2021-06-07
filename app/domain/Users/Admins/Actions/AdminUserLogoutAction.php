<?php


namespace Domain\Users\Admins\Actions;

use Domain\Users\Admins\Models\Admin;
use Illuminate\Http\JsonResponse;

class AdminUserLogoutAction
{
    /**
     * @param $id
     * @return JsonResponse
     */
    public function execute($id): JsonResponse
    {
        /** @var Admin $admin */
        $admin = Admin::findOrFail($id);

        $admin->tokens()->delete();

        return response()->json(null, 204);
    }
}
