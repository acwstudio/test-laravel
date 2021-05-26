<?php

namespace App\Http\AppAPI\Controllers\Customer;

use App\Http\AppAPI\Controllers\Controller;
use Domain\Customers\Actions\CustomerCreateTokenAction;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class APICustomerLoginController extends Controller
{
    /**
     * Show Login form
     *
     * @param CustomerCreateTokenAction $action
     * @return Application|Factory|View
     */
    public function showLoginForm(CustomerCreateTokenAction $action): Application|Factory|View
    {
        $action->execute();
        return view('admin.login');
    }
}
