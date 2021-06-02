<?php

namespace App\Http\AppAPI\Controllers\Admin\CRUD;

use App\Http\AppAPI\Controllers\Controller;
use App\Http\AppAPI\Requests\Admin\AdminCreateRequest;
use Domain\Admins\Actions\AdminUserCreateAction;
use Illuminate\Http\JsonResponse;
use function response;

class APIAdminUserStoreController extends Controller
{
    /**
     * @var AdminUserCreateAction
     */
    public AdminUserCreateAction $adminCreateAction;

    /**
     * APIAdminUserStoreController constructor.
     * @param AdminUserCreateAction $adminCreateAction
     */
    public function __construct(AdminUserCreateAction $adminCreateAction)
    {
        $this->adminCreateAction = $adminCreateAction;
    }

    /**
     * @param AdminCreateRequest $adminCreateRequest
     * @return JsonResponse
     */
    public function store(AdminCreateRequest $adminCreateRequest): JsonResponse
    {
        $dataAttributes = $adminCreateRequest->input('data.attributes');

        $admin = $this->adminCreateAction->execute($dataAttributes);

        return response()->json([
            'admin' => $admin
        ]);
    }
}
