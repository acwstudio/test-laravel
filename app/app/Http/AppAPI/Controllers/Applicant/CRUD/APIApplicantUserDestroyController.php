<?php

namespace App\Http\AppAPI\Controllers\Applicant\CRUD;

use App\Http\AppAPI\Controllers\Controller;
use Domain\Users\Applicants\Actions\ApplicantUserDestroyAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class APIApplicantUserDestroyController extends Controller
{
    /**
     * @param ApplicantUserDestroyAction $applicantUserDestroyAction
     * @param $id
     * @return JsonResponse
     */
    public function destroy(ApplicantUserDestroyAction $applicantUserDestroyAction, $id): JsonResponse
    {
        return $applicantUserDestroyAction->execute($id);
    }
}
