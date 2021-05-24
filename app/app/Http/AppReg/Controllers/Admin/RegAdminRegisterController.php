<?php

namespace App\Http\AppReg\Controllers\Admin;

use App\Http\AppAPI\Requests\Admin\AdminRegisterRequest;
use App\Http\AppReg\Controllers\Controller;
use Domain\Admins\Actions\AdminCreateAction;
use Domain\Admins\Actions\AdminSendEmailAction;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class RegAdminRegisterController extends Controller
{
    /**
     * @var AdminCreateAction
     */
    public AdminCreateAction $adminCreateAction;

    /**
     * @var AdminSendEmailAction
     */
    public AdminSendEmailAction $adminSendEmailAction;

    /**
     * RegAdminRegisterController constructor.
     *
     * @param AdminCreateAction $adminCreateAction
     * @param AdminSendEmailAction $adminSendEmailAction
     */
    public function __construct(AdminCreateAction $adminCreateAction, AdminSendEmailAction $adminSendEmailAction)
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
