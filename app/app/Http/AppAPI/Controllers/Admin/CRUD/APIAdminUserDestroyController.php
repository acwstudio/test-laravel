<?php

namespace App\Http\AppAPI\Controllers\Admin\CRUD;

use App\Http\AppAPI\Controllers\Controller;
use Domain\Users\Admins\Actions\AdminUserDestroyAction;
use Illuminate\Http\JsonResponse;

class APIAdminUserDestroyController extends Controller
{
    /**
     * @param AdminUserDestroyAction $adminUserDestroyAction
     * @param $id
     * @return JsonResponse
     */
    public function destroy(AdminUserDestroyAction $adminUserDestroyAction, $id): JsonResponse
    {
        if (auth()->user()->getAuthIdentifier() === $id) {
            return $adminUserDestroyAction->execute($id);
        }

        return response()->json([
            "error" => "You are not the account's owner"
        ], 403);

    }
}
