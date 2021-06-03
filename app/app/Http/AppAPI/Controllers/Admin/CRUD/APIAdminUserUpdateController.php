<?php

namespace App\Http\AppAPI\Controllers\Admin\CRUD;

use App\Http\AppAPI\Controllers\Controller;
use App\Http\AppAPI\Requests\Admin\APIAdminUserUpdateRequest;
use App\Http\AppAPI\Resources\Admin\AdminResource;
use Domain\Users\Admins\Actions\AdminUserUpdateAction;
use Illuminate\Http\JsonResponse;

class APIAdminUserUpdateController extends Controller
{
    /**
     * @var AdminUserUpdateAction
     */
    public AdminUserUpdateAction $adminUserUpdateAction;

    /**
     * APIAdminUserUpdateController constructor.
     * @param AdminUserUpdateAction $adminUserUpdateAction
     */
    public function __construct(AdminUserUpdateAction $adminUserUpdateAction)
    {
        $this->adminUserUpdateAction = $adminUserUpdateAction;
    }

    /**
     * @param APIAdminUserUpdateRequest $adminUserUpdateRequest
     * @param int $id
     * @return JsonResponse
     */
    public function update(APIAdminUserUpdateRequest $adminUserUpdateRequest, int $id): JsonResponse
    {
        $dataAttributes = $adminUserUpdateRequest->input('data.attributes');

        $admin = $this->adminUserUpdateAction->execute($dataAttributes, $id);

        return response()->json([
            'data' => new AdminResource($admin),
            'password' => $dataAttributes['password']
        ]);
    }
}
