<?php

namespace App\Http\AppAPI\Controllers\Admin\Auth;

use App\Http\AppAPI\Controllers\Controller;
use App\Http\AppAPI\Requests\Admin\AdminLoginRequest;
use Domain\Admins\Actions\AdminUserLoginAction;
use Domain\Admins\Actions\AdminUserLogoutAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class APIAdminUserLoginController extends Controller
{
    /**
     * @var AdminUserLoginAction
     */
    public AdminUserLoginAction $adminLoginAction;

    /**
     * @var AdminUserLogoutAction
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
     * @param AdminLoginRequest $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function login(AdminLoginRequest $request): JsonResponse
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
