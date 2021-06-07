<?php

namespace App\Http\AppAPI\Controllers\Employer\Relationships;

use App\Http\AppAPI\Controllers\Controller;
use App\Http\AppAPI\Resources\Token\TokenIdentifierResource;
use Domain\Users\Employers\Models\Employer;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class APIEmployerUserTokensRelationshipsController extends Controller
{
    /**
     * @param $id
     * @return AnonymousResourceCollection
     */
    public function index($id): AnonymousResourceCollection
    {
        $employer = Employer::findOrFail($id);

        return TokenIdentifierResource::collection($employer->tokens);
    }
}
