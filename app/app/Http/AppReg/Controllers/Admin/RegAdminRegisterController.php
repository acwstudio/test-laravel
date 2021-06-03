<?php

namespace App\Http\AppReg\Controllers\Admin;

use App\Http\AppAPI\Requests\Admin\APIAdminUserRegisterRequest;
use App\Http\AppReg\Controllers\Controller;
use Domain\Users\Admins\Actions\AdminUserCreateAction;
use Domain\Users\Actions\UsersCreatedSendEmailAction;
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
     * @var \Domain\Users\Actions\UsersCreatedSendEmailAction
     */
    public UsersCreatedSendEmailAction $adminSendEmailAction;

    /**
     * RegAdminRegisterController constructor.
     *
     * @param \Domain\Users\Admins\Actions\AdminUserCreateAction $adminCreateAction
     * @param UsersCreatedSendEmailAction $adminSendEmailAction
     */
    public function __construct(AdminUserCreateAction $adminCreateAction, UsersCreatedSendEmailAction $adminSendEmailAction)
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
     * @param APIAdminUserRegisterRequest $request
     * @return string
     */
    public function register(APIAdminUserRegisterRequest $request): string
    {
        $admin = $this->adminCreateAction->execute($request);
        $this->adminSendEmailAction->execute($admin->email, []);

        return 'ok';
    }
}
