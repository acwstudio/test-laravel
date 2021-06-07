<?php

namespace App\Http\AppAPI\Controllers\Employer\Relationships;

use App\Http\AppAPI\Controllers\Controller;
use App\Http\AppAPI\Resources\Token\TokenCollection;
use Domain\Users\Employers\Models\Employer;
use Illuminate\Http\Request;

class APIEmployerUserTokensRelatedController extends Controller
{
    /**
     * @param $id
     * @return TokenCollection
     */
    public function index($id): TokenCollection
    {
        $employer = Employer::findOrFail($id);

        return new TokenCollection($employer->tokens);
    }
}
