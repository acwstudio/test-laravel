<?php

namespace App\Http\AppAPI\Controllers\Admin;

use App\Http\AppAPI\Controllers\Controller;
use App\Http\AppAPI\Requests\Admin\AdminLoginRequest;
use Auth;
use Domain\Admins\Actions\AdminLoginAction;
use Domain\Admins\Actions\AdminLogoutAction;

class APIAdminLoginController extends Controller
{
    /**
     * @var AdminLoginAction
     */
    public AdminLoginAction $adminLoginAction;

    /**
     * @var AdminLogoutAction
     */
    public AdminLogoutAction $adminLogoutAction;

    public function __construct(AdminLoginAction $adminLoginAction, AdminLogoutAction $adminLogoutAction)
    {
        $this->adminLoginAction = $adminLoginAction;
        $this->adminLogoutAction = $adminLogoutAction;
    }

    public function login(AdminLoginRequest $request)
    {
//        $attr = $request->only('email', 'password');
//        if (!Auth::attempt($attr)) {
//            return response()->json([
//                'message' => 'Invalid login details'
//            ], 401);
//        }
        return 'ok';
    }

    public function logout()
    {
        return auth()->user()->tokenCan('api');
    }
}
