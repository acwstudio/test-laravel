<?php

namespace App\Http\AppAPI\Controllers\Admin\CRUD;

use App\Http\AppAPI\Controllers\Controller;
use App\Http\AppAPI\Requests\Admin\APIAdminUserUpdateRequest;
use App\Http\AppAPI\Resources\Admin\AdminResource;
use App\Models\Token;
use Domain\Users\Admins\Actions\AdminUserLoginAction;
use Domain\Users\Admins\Actions\AdminUserUpdateAction;
use Domain\Users\Admins\Models\Admin;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class APIAdminUserUpdateController extends Controller
{
    /**
     * @var AdminUserUpdateAction
     */
    public AdminUserUpdateAction $adminUserUpdateAction;

    /**
     * @var AdminUserLoginAction
     */
    public AdminUserLoginAction $adminUserLoginAction;

    /**
     * APIAdminUserUpdateController constructor.
     * @param AdminUserUpdateAction $adminUserUpdateAction
     * @param AdminUserLoginAction $adminUserLoginAction
     */
    public function __construct(AdminUserUpdateAction $adminUserUpdateAction,
                                AdminUserLoginAction $adminUserLoginAction)
    {
        $this->adminUserUpdateAction = $adminUserUpdateAction;
        $this->adminUserLoginAction = $adminUserLoginAction;
    }

    /**
     * @param APIAdminUserUpdateRequest $adminUserUpdateRequest
     * @param int $id
     * @return JsonResponse
     * @throws ValidationException
     */
    public function update(APIAdminUserUpdateRequest $adminUserUpdateRequest, int $id): JsonResponse
    {
        $dataAttributes = $adminUserUpdateRequest->input('data.attributes');
        $hasToken = Admin::findOrFail($id)->tokens->count();

        $admin = $this->adminUserUpdateAction->execute($dataAttributes, $id);

        if ($hasToken) {
            $dataAttributes['client'] = $adminUserUpdateRequest->user()->currentAccessToken()->name;
            $token = $this->adminUserLoginAction->execute($dataAttributes);
        }

        return response()->json([
            'data' => new AdminResource($admin),
            'password' => $dataAttributes['password'],
            'token' => $token['token'] ?? ''
        ]);
    }
}
