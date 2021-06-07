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
     * APIAdminUserLoginController constructor.
     * @param AdminUserLoginAction $adminLoginAction
     */
    public function __construct(AdminUserLoginAction $adminLoginAction)
    {
        $this->adminLoginAction = $adminLoginAction;
    }

    /**
     * @param APIAdminUserLoginRequest $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function login(APIAdminUserLoginRequest $request): JsonResponse
    {
        $dataAttributes = $request->input('data.attributes');

        return response()->json($this->adminLoginAction->execute($dataAttributes), 201);
    }
}
