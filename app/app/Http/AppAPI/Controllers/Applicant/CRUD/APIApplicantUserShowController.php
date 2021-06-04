<?php

namespace App\Http\AppAPI\Controllers\Applicant\CRUD;

use App\Http\AppAPI\Controllers\Controller;
use App\Http\AppAPI\Resources\Applicant\ApplicantResource;
use Domain\Users\Applicants\Models\Applicant;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class APIApplicantUserShowController extends Controller
{
    public function show($id)
    {
        $applicant = QueryBuilder::for(Applicant::class)
            ->where('id', $id)
            ->allowedIncludes(['tokens'])
            ->firstOrFail();

        return new ApplicantResource($applicant);
    }
}
