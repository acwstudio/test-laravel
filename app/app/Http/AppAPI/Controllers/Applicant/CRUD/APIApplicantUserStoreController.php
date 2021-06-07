<?php

namespace App\Http\AppAPI\Controllers\Applicant\CRUD;

use App\Http\AppAPI\Controllers\Controller;
use App\Http\AppAPI\Requests\Applicant\APIApplicantUserCreateRequest;
use App\Http\AppAPI\Resources\Applicant\ApplicantResource;
use Domain\Users\Applicants\Actions\ApplicantUserCreateAction;
use Illuminate\Http\JsonResponse;

class APIApplicantUserStoreController extends Controller
{
    /**
     * @var ApplicantUserCreateAction
     */
    public ApplicantUserCreateAction $applicantUserCreateAction;

    /**
     * APIApplicantUserStoreController constructor.
     * @param ApplicantUserCreateAction $applicantUserCreateAction
     */
    public function __construct(ApplicantUserCreateAction $applicantUserCreateAction)
    {
        $this->applicantUserCreateAction = $applicantUserCreateAction;
    }

    /**
     * @param APIApplicantUserCreateRequest $applicantUserCreateRequest
     * @return JsonResponse
     */
    public function store(APIApplicantUserCreateRequest $applicantUserCreateRequest): JsonResponse
    {
        $dataAttributes = $applicantUserCreateRequest->input('data.attributes');

        $applicant = $this->applicantUserCreateAction->execute($dataAttributes);

        return response()->json([
            new ApplicantResource($applicant),
            'password' => $dataAttributes['password']
        ]);
    }
}
