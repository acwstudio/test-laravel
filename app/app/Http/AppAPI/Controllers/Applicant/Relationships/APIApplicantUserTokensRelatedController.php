<?php

namespace App\Http\AppAPI\Controllers\Applicant\Relationships;

use App\Http\AppAPI\Controllers\Controller;
use App\Http\AppAPI\Resources\Token\TokenCollection;
use Domain\Users\Applicants\Models\Applicant;
use Illuminate\Http\Request;

class APIApplicantUserTokensRelatedController extends Controller
{
    /**
     * @param $id
     * @return TokenCollection
     */
    public function index($id): TokenCollection
    {
        $applicant = Applicant::findOrFail($id);

        return new TokenCollection($applicant->tokens);
    }
}
