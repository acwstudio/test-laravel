<?php

namespace App\Http\AppAPI\Controllers\Token;

use App\Http\AppAPI\Controllers\Controller;
use App\Http\AppAPI\Resources\Token\TokenCollection;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;

class APITokenIndexController extends Controller
{
    public function index()
    {
        $tokens = PersonalAccessToken::all();

        return new TokenCollection($tokens);
    }
}
