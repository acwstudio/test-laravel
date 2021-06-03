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
        return $adminUserDestroyAction->execute($id);
    }
}
