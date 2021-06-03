<?php

namespace App\Http\AppAPI\Controllers\Token\CRUD;

use App\Http\AppAPI\Controllers\Controller;
use App\Http\AppAPI\Resources\Token\TokenResource;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;

class APITokenShowController extends Controller
{
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
