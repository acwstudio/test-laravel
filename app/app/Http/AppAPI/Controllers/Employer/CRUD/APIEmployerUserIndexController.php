<?php

namespace App\Http\AppAPI\Controllers\Employer\CRUD;

use App\Http\AppAPI\Controllers\Controller;
use App\Http\AppAPI\Resources\Employer\EmployerCollection;
use Domain\Users\Employers\Models\Employer;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class APIEmployerUserIndexController extends Controller
{
    /**
     * @param Request $request
     * @return EmployerCollection
     */
    public function index(Request $request): EmployerCollection
    {
        $perPage = $request->get('per_page');

        $employer = QueryBuilder::for(Employer::class)
            ->allowedIncludes(['tokens'])
            ->allowedSorts(['name', 'email'])
            ->jsonPaginate($perPage);

        return new EmployerCollection($employer);
    }
}
