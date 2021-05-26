<?php

namespace App\Http\AppAPI\Controllers\Token;

use App\Http\AppAPI\Controllers\Controller;
use App\Http\AppAPI\Resources\Token\TokenCollection;
use App\Http\AppAPI\Resources\Token\TokenResource;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;

class APITokenIndexController extends Controller
{
    /**
     * @return TokenCollection
     */
    public function index(): TokenCollection
    {
        $tokens = PersonalAccessToken::with('tokenable')->get();

        return new TokenCollection($tokens);
    }

    /**
     * @param $id
     * @return TokenResource
     */
    public function show($id): TokenResource
    {
        $token = PersonalAccessToken::with('tokenable')->findOrFail($id);

        return new TokenResource($token);
    }
}
