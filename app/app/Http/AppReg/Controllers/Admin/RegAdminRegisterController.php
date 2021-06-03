<?php

namespace App\Http\AppReg\Controllers\Admin;

use App\Http\AppAPI\Requests\Admin\AdminRegisterRequest;
use App\Http\AppReg\Controllers\Controller;
use Domain\Users\Admins\Actions\AdminUserCreateAction;
use Domain\Admins\Actions\AdminSendEmailAction;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class RegAdminRegisterController extends Controller
{
    /**
     * @var \Domain\Users\Admins\Actions\AdminUserCreateAction
     */
    public AdminUserCreateAction $adminCreateAction;

    /**
     * @var AdminSendEmailAction
     */
    public AdminSendEmailAction $adminSendEmailAction;

    /**
     * RegAdminRegisterController constructor.
     *
     * @param \Domain\Users\Admins\Actions\AdminUserCreateAction $adminCreateAction
     * @param AdminSendEmailAction $adminSendEmailAction
     */
    public function __construct(AdminUserCreateAction $adminCreateAction, AdminSendEmailAction $adminSendEmailAction)
    {
        $this->adminCreateAction = $adminCreateAction;
        $this->adminSendEmailAction = $adminSendEmailAction;
    }


    /**
     * @return View|Factory|Application
     */
    public function showRegistrationForm(): View|Factory|Application
    {
        return view('admin.register');
    }

    /**
     * @param AdminRegisterRequest $request
     * @return string
     */
    public function register(AdminRegisterRequest $request): string
    {
        $admin = $this->adminCreateAction->execute($request);
        $this->adminSendEmailAction->execute($admin->email, []);

        return 'ok';
    }
}
