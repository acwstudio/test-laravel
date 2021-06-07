<?php

namespace App\Http\AppAPI\Controllers\Admin\Auth;

use App\Http\AppAPI\Controllers\Controller;
use Domain\Users\Admins\Actions\AdminUserLogoutAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class APIAdminUserLogoutController extends Controller
{
    /**
     * @param AdminUserLogoutAction $adminUserLogoutAction
     * @return JsonResponse
     */
    public function logout(AdminUserLogoutAction $adminUserLogoutAction): JsonResponse
    {
        $id = auth()->user()->getAuthIdentifier();

        return $adminUserLogoutAction->execute($id);
    }
}
