<?php


namespace Domain\Users\Admins\Actions;


use Domain\Users\Admins\Models\Admin;
use Illuminate\Http\JsonResponse;

class AdminUserDestroyAction
{
    /**
     * @param int $id
     * @return JsonResponse
     */
    public function execute(int $id): JsonResponse
    {
        $admin = Admin::findOrFail($id);
        $admin->tokens()->delete();
        $admin->delete();

        return response()->json(null, 204);
    }
}
