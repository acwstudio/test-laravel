<?php

namespace App\Http\AppAPI\Controllers\Applicant\Auth;

use App\Http\AppAPI\Controllers\Controller;
use App\Http\AppAPI\Requests\Applicant\APIApplicantUserLoginRequest;
use Domain\Users\Applicants\Actions\ApplicantUserLoginAction;
use Illuminate\Http\Request;

class APIApplicantUserLoginController extends Controller
{
    /**
     * @var ApplicantUserLoginAction
     */
    public ApplicantUserLoginAction $applicantUserLoginAction;

    /**
     * APIApplicantUserLoginController constructor.
     * @param ApplicantUserLoginAction $applicantUserLoginAction
     */
    public function __construct(ApplicantUserLoginAction $applicantUserLoginAction)
    {
        $this->applicantUserLoginAction = $applicantUserLoginAction;
    }

    public function login(APIApplicantUserLoginRequest $applicantUserLoginRequest)
    {
        return response()->json($this->applicantUserLoginAction->execute($applicantUserLoginRequest->all()), 201);
    }
}
