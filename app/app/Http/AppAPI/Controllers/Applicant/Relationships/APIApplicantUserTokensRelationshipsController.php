<?php

namespace App\Http\AppAPI\Controllers\Applicant\Relationships;

use App\Http\AppAPI\Controllers\Controller;
use App\Http\AppAPI\Resources\Token\TokenIdentifierResource;
use Domain\Users\Applicants\Models\Applicant;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class APIApplicantUserTokensRelationshipsController extends Controller
{
    /**
     * @param $id
     * @return AnonymousResourceCollection
     */
    public function index($id): AnonymousResourceCollection
    {
        $applicant = Applicant::findOrFail($id);

        return TokenIdentifierResource::collection($applicant->tokens);
    }
}
