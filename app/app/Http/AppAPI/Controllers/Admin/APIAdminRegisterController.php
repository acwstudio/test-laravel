<?php

namespace App\Http\AppAPI\Controllers\Admin;

use App\Http\AppAPI\Controllers\Controller;
use App\Http\AppAPI\Requests\Admin\AdminRegisterRequest;
use Domain\Admins\Actions\AdminCreateAction;
use Domain\Admins\Actions\AdminCreateTokenAction;
use Illuminate\Http\JsonResponse;

class APIAdminRegisterController extends Controller
{
    /**
     * @var AdminCreateAction
     */
    public AdminCreateAction $adminCreateAction;

    /**
     * @var AdminCreateTokenAction
     */
    public AdminCreateTokenAction $adminCreateTokenAction;

    /**
     * APIAdminRegisterController constructor.
     * @param AdminCreateAction $adminCreateAction
     * @param AdminCreateTokenAction $adminCreateTokenAction
     */
    public function __construct(AdminCreateAction $adminCreateAction, AdminCreateTokenAction $adminCreateTokenAction)
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
