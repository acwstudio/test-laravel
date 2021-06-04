<?php

namespace App\Http\AppAPI\Controllers\Employer\Auth;

use App\Http\AppAPI\Controllers\Controller;
use Domain\Users\Employers\Actions\EmployerUserLogoutAction;
use Illuminate\Http\Request;

class APIEmployerUserLogoutController extends Controller
{
    public function logout(EmployerUserLogoutAction $employerUserLogoutAction)
    {
        return $employerUserLogoutAction->execute();
    }
}
