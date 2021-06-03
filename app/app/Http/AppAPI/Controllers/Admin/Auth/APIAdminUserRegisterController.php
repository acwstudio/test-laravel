<?php

namespace App\Http\AppAPI\Controllers\Admin\Auth;

use App\Http\AppAPI\Controllers\Controller;
use App\Http\AppAPI\Requests\Admin\AdminRegisterRequest;
use Domain\Users\Admins\Actions\AdminUserCreateAction;
use Domain\Admins\Actions\AdminUserCreateTokenAction;
use Illuminate\Http\JsonResponse;

class APIAdminUserRegisterController extends Controller
{
    /**
     * @var AdminUserCreateAction
     */
    public AdminUserCreateAction $adminCreateAction;

    /**
     * @var AdminUserCreateTokenAction
     */
    public AdminUserCreateTokenAction $adminCreateTokenAction;

    /**
     * APIAdminUserRegisterController constructor.
     * @param AdminUserCreateAction $adminCreateAction
     * @param AdminUserCreateTokenAction $adminCreateTokenAction
     */
    public function __construct(AdminUserCreateAction $adminCreateAction, AdminUserCreateTokenAction $adminCreateTokenAction)
    {
        $this->adminCreateAction = $adminCreateAction;
        $this->adminCreateTokenAction = $adminCreateTokenAction;
    }

    /**
     * @param AdminRegisterRequest $request
     * @return JsonResponse
     */
    public function register(AdminRegisterRequest $request): JsonResponse
    {
        $admin = $this->adminCreateAction->execute($request->all());
        $token = $this->adminCreateTokenAction->execute($request->all());

        return response()->json([
            'admin' => $admin,
            'access_token' => $token,
            'type_token' => 'Bearer'
        ]);
    }
}
