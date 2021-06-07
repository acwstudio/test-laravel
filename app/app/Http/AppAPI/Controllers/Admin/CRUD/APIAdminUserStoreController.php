<?php

namespace App\Http\AppAPI\Controllers\Admin\CRUD;

use App\Http\AppAPI\Controllers\Controller;
use App\Http\AppAPI\Requests\Admin\APIAdminUserCreateRequest;
use App\Http\AppAPI\Resources\Admin\AdminResource;
use Domain\Users\Admins\Actions\AdminUserCreateAction;
use Illuminate\Http\JsonResponse;

class APIAdminUserStoreController extends Controller
{
    /**
     * @var AdminUserCreateAction
     */
    public AdminUserCreateAction $adminUserCreateAction;

    /**
     * APIAdminUserStoreController constructor.
     * @param AdminUserCreateAction $adminUserCreateAction
     */
    public function __construct(AdminUserCreateAction $adminUserCreateAction)
    {
        $this->adminUserCreateAction = $adminUserCreateAction;
    }

    /**
     * @param APIAdminUserCreateRequest $adminUserCreateRequest
     * @return JsonResponse
     */
    public function store(APIAdminUserCreateRequest $adminUserCreateRequest): JsonResponse
    {
        $dataAttributes = $adminUserCreateRequest->input('data.attributes');

        $admin = $this->adminUserCreateAction->execute($dataAttributes);

        return response()->json([
            'data' => new AdminResource($admin),
            'password' => $dataAttributes['password']
        ]);
    }
}
