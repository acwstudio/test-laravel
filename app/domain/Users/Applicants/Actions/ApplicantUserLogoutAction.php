<?php


namespace Domain\Users\Applicants\Actions;


use Domain\Users\Applicants\Models\Applicant;
use Illuminate\Http\JsonResponse;

class ApplicantUserLogoutAction
{
    /**
     * @return JsonResponse
     */
    public function execute(): JsonResponse
    {
        /** @var Applicant $applicant */
        $applicant = auth()->guard('api-applicant')->user();

        $applicant->tokens()->delete();

        return response()->json(null, 204);
    }
}
