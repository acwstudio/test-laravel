<?php

namespace App\Http\AppAPI\Controllers\Admin\Auth;

use App\Http\AppAPI\Controllers\Controller;
use App\Http\AppAPI\Requests\Admin\APIAdminUserLoginRequest;
use Domain\Users\Admins\Actions\AdminUserLoginAction;
use Domain\Users\Admins\Actions\AdminUserLogoutAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class APIAdminUserLoginController extends Controller
{
    /**
     * @var AdminUserLoginAction
     */
    public AdminUserLoginAction $adminLoginAction;

    /**
     * @var \Domain\Users\Admins\Actions\AdminUserLogoutAction
     */
    public AdminUserLogoutAction $adminLogoutAction;

    /**
     * APIAdminUserLoginController constructor.
     * @param AdminUserLoginAction $adminLoginAction
     * @param AdminUserLogoutAction $adminLogoutAction
     */
    public function __construct(AdminUserLoginAction $adminLoginAction, AdminUserLogoutAction $adminLogoutAction)
    {
        $this->adminLoginAction = $adminLoginAction;
        $this->adminLogoutAction = $adminLogoutAction;
    }

    /**
     * @param APIAdminUserLoginRequest $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function login(APIAdminUserLoginRequest $request): JsonResponse
    {
        return response()->json($this->adminLoginAction->execute($request->all()), 201);
    }

    /**
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        return $this->adminLogoutAction->execute();
    }
}
