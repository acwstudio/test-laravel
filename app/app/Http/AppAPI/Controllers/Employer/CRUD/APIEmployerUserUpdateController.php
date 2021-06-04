<?php

namespace App\Http\AppAPI\Controllers\Employer\CRUD;

use App\Http\AppAPI\Controllers\Controller;
use App\Http\AppAPI\Requests\Employer\APIEmployerUserUpdateRequest;
use App\Http\AppAPI\Resources\Employer\EmployerResource;
use Domain\Users\Employers\Actions\EmployerUserUpdateAction;
use Illuminate\Http\JsonResponse;

class APIEmployerUserUpdateController extends Controller
{
    /**
     * @var EmployerUserUpdateAction
     */
    public EmployerUserUpdateAction $employerUserUpdateAction;

    /**
     * APIEmployerUserUpdateController constructor.
     * @param EmployerUserUpdateAction $employerUserUpdateAction
     */
    public function __construct(EmployerUserUpdateAction $employerUserUpdateAction)
    {
        $this->employerUserUpdateAction = $employerUserUpdateAction;
    }

    /**
     * @param APIEmployerUserUpdateRequest $employerUserUpdateRequest
     * @param $id
     * @return JsonResponse
     */
    public function update(APIEmployerUserUpdateRequest $employerUserUpdateRequest, $id): JsonResponse
    {
        $dataAttributes = $employerUserUpdateRequest->input('data.attributes');

        $employer = $this->employerUserUpdateAction->execute($dataAttributes, $id);

        return response()->json([
            'data' => new EmployerResource($employer),
            'password' => $dataAttributes['password']
        ]);

    }
}
