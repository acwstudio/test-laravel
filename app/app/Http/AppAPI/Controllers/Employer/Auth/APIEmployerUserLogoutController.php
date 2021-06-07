<?php

namespace App\Http\AppAPI\Controllers\Employer\Auth;

use App\Http\AppAPI\Controllers\Controller;
use Domain\Users\Employers\Actions\EmployerUserLogoutAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class APIEmployerUserLogoutController extends Controller
{
    /**
     * @param EmployerUserLogoutAction $employerUserLogoutAction
     * @return JsonResponse
     */
    public function logout(EmployerUserLogoutAction $employerUserLogoutAction): JsonResponse
    {
        return $employerUserLogoutAction->execute();
    }
}
