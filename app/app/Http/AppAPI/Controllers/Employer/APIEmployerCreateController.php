<?php

namespace App\Http\AppAPI\Controllers\Employer;

use App\Http\AppAPI\Controllers\Controller;
use App\Http\AppAPI\Requests\Employer\EmployerCreateRequest;
use App\Http\AppAPI\Resources\Employer\EmployerResource;
use Domain\Employers\Actions\EmployerCreateAction;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class APIEmployerCreateController extends Controller
{
    public EmployerCreateAction $employerCreateAction;

    /**
     * APIEmployerCreateController constructor.
     * @param EmployerCreateAction $employerCreateAction
     */
    public function __construct(EmployerCreateAction $employerCreateAction)
    {
        $this->employerCreateAction = $employerCreateAction;
    }

    /**
     * @param EmployerCreateRequest $request
     * @return Application|ResponseFactory|Response
     */
    public function create(EmployerCreateRequest $request): Application|ResponseFactory|Response
    {
        $request['password'] = \Hash::make($request->get('password'));

        $employer = $this->employerCreateAction->execute($request->only('name', 'email', 'password'));

        return response([
            'data' => new EmployerResource($employer),
        ], 201)->header('Location', '');
    }
}
