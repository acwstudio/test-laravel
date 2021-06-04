<?php

namespace App\Http\AppAPI\Controllers\Employer\CRUD;

use App\Http\AppAPI\Controllers\Controller;
use App\Http\AppAPI\Resources\Employer\EmployerResource;
use Domain\Users\Employers\Models\Employer;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class APIEmployerUserShowController extends Controller
{
    public function show($id)
    {
        $employer = QueryBuilder::for(Employer::class)
            ->where('id', $id)
            ->allowedIncludes(['tokens'])
            ->firstOrFail();

        return new EmployerResource($employer);
    }
}
