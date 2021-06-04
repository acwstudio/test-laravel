<?php

namespace App\Http\AppAPI\Controllers\Employer\CRUD;

use App\Http\AppAPI\Controllers\Controller;
use Domain\Users\Employers\Actions\EmployerUserDestroyAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class APIEmployerUserDestroyController extends Controller
{
    public function destroy(EmployerUserDestroyAction $employerUserDestroyAction, $id): JsonResponse
    {
        return $employerUserDestroyAction->execute($id);
    }
}
