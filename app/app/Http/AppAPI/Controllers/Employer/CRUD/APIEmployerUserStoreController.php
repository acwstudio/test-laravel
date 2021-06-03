<?php

namespace App\Http\AppAPI\Controllers\Employer\CRUD;

use App\Http\AppAPI\Controllers\Controller;
use App\Http\AppAPI\Requests\Employer\APIEmployerUserCreateRequest;
use App\Http\AppAPI\Resources\Employer\EmployerResource;
use Domain\Users\Employers\Actions\EmployerUserCreateAction;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;

class APIEmployerUserStoreController extends Controller
{
    public EmployerUserCreateAction $employerCreateAction;

    /**
     * APIEmployerUserStoreController constructor.
     * @param EmployerUserCreateAction $employerCreateAction
     */
    public function __construct(EmployerUserCreateAction $employerCreateAction)
    {
        $this->employerCreateAction = $employerCreateAction;
    }

    /**
     * @param APIEmployerUserCreateRequest $employerUserCreateRequest
     * @return Application|ResponseFactory|Response
     */
    public function store(APIEmployerUserCreateRequest $employerUserCreateRequest): Application|ResponseFactory|Response
    {
        $dataAttributes = $employerUserCreateRequest->input('data.attributes');

        $employer = $this->employerCreateAction->execute($dataAttributes);

        return response([
            'data' => new EmployerResource($employer),
            'password' => $dataAttributes['password']
        ], 201)->header('Location', '');
    }
}
