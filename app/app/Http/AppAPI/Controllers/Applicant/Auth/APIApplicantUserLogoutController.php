<?php

namespace App\Http\AppAPI\Controllers\Applicant\Auth;

use App\Http\AppAPI\Controllers\Controller;
use Domain\Users\Applicants\Actions\ApplicantUserLogoutAction;
use Illuminate\Http\JsonResponse;

class APIApplicantUserLogoutController extends Controller
{
    /**
     * @param ApplicantUserLogoutAction $applicantUserLogoutAction
     * @return JsonResponse
     */
    public function logout(ApplicantUserLogoutAction $applicantUserLogoutAction): JsonResponse
    {
        return $applicantUserLogoutAction->execute();
    }
}
