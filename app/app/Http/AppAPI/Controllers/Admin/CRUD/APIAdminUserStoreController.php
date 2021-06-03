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
     * @var \Domain\Users\Admins\Actions\AdminUserCreateAction
     */
    public AdminUserCreateAction $adminUserCreateAction;

    /**
     * APIAdminUserStoreController constructor.
     * @param \Domain\Users\Admins\Actions\AdminUserCreateAction $adminCreateAction
     */
    public function __construct(AdminUserCreateAction $adminUserCreateAction)
    {
        $this->adminCreateAction = $adminUserCreateAction;
    }

    /**
     * @param APIAdminUserCreateRequest $adminCreateRequest
     * @return JsonResponse
     */
    public function store(APIAdminUserCreateRequest $adminUserCreateRequest): JsonResponse
    {
        $dataAttributes = $adminUserCreateRequest->input('data.attributes');

        $admin = $this->adminUserCreateAction->execute($dataAttributes);

        return response()->json([
            new AdminResource($admin),
            'password' => $dataAttributes['password']
        ]);
    }
}
