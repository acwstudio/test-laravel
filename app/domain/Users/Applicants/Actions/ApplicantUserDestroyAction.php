<?php


namespace Domain\Users\Applicants\Actions;


use Domain\Users\Applicants\Models\Applicant;
use Illuminate\Http\JsonResponse;

class ApplicantUserDestroyAction
{
    /**
     * @param $id
     * @return JsonResponse
     */
    public function execute($id): JsonResponse
    {
        $employer = Applicant::findOrFail($id);
        $employer->tokens()->delete();
        $employer->delete();

        return response()->json(null, 204);
    }

}
