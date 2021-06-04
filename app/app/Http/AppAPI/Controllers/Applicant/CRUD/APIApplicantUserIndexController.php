<?php

namespace App\Http\AppAPI\Controllers\Applicant\CRUD;

use App\Http\AppAPI\Controllers\Controller;
use App\Http\AppAPI\Resources\Applicant\ApplicantCollection;
use Domain\Users\Applicants\Models\Applicant;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class APIApplicantUserIndexController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->get('per_page');

        $applicants = QueryBuilder::for(Applicant::class)
            ->allowedIncludes(['tokens'])
            ->allowedSorts(['name', 'email'])
            ->jsonPaginate($perPage);

        return new ApplicantCollection($applicants);
    }
}
