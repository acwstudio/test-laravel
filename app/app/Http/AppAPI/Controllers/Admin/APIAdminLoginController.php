<?php

namespace App\Http\AppAPI\Controllers\Admin;

use App\Http\AppAPI\Controllers\Controller;
use Domain\Admins\Actions\AdminCreateTokenAction;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use function view;

class APIAdminLoginController extends Controller
{
    /**
     * Show Login form
     *
     * @param AdminCreateTokenAction $action
     * @return View|Factory|Application
     */
    public function showLoginForm(AdminCreateTokenAction $action): View|Factory|Application
    {
        $action->execute();
        return view('admin.login');
    }
}
