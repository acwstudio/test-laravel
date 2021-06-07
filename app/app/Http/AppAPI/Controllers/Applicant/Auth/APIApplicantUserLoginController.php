<?php

namespace App\Http\AppAPI\Controllers\Applicant\Auth;

use App\Http\AppAPI\Controllers\Controller;
use App\Http\AppAPI\Requests\Applicant\APIApplicantUserLoginRequest;
use Domain\Users\Applicants\Actions\ApplicantUserLoginAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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


    /**
     * @param APIApplicantUserLoginRequest $applicantUserLoginRequest
     * @return JsonResponse
     * @throws ValidationException
     */
    public function login(APIApplicantUserLoginRequest $applicantUserLoginRequest): JsonResponse
    {
        return response()->json($this->applicantUserLoginAction->execute($applicantUserLoginRequest->all()), 201);
    }
}
