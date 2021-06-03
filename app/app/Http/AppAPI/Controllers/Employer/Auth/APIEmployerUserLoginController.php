<?php

namespace App\Http\AppAPI\Controllers\Employer\Auth;

use App\Http\AppAPI\Controllers\Controller;
use App\Http\AppAPI\Requests\Employer\APIEmployerUserLoginRequest;
use Domain\Users\Employers\Actions\EmployerUserLoginAction;
use Illuminate\Http\Request;

class APIEmployerUserLoginController extends Controller
{
    /**
     * @var EmployerUserLoginAction
     */
    public EmployerUserLoginAction $employerUserLoginAction;

    /**
     * APIEmployerUserLoginController constructor.
     * @param EmployerUserLoginAction $employerUserLoginAction
     */
    public function __construct(EmployerUserLoginAction $employerUserLoginAction)
    {
        $this->employerUserLoginAction = $employerUserLoginAction;
    }

    public function login(APIEmployerUserLoginRequest $employerUserLoginRequest)
    {
        return response()->json($this->employerUserLoginAction->execute($employerUserLoginRequest->all()), 201);
    }
}
