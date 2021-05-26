<?php

namespace App\Http\AppAPI\Controllers\Token;

use App\Http\AppAPI\Controllers\Controller;
use App\Http\AppAPI\Resources\Admin\AdminResource;
use App\Http\AppAPI\Resources\Customer\CustomerResource;
use App\Http\AppAPI\Resources\Token\TokenResource;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;

class APITokensTokenableRelatedController extends Controller
{
    /**
     * Get related resource
     *
     * @param $id
     * @return CustomerResource|AdminResource|string
     */
    public function index($id): CustomerResource|AdminResource|string
    {
        return $this->typeResource($id);
    }

    /**
     * resource selection depending on the entity tokenable
     *
     * @param $id
     * @return CustomerResource|AdminResource|string
     */
    private function typeResource($id): CustomerResource|AdminResource|string
    {
        $token = PersonalAccessToken::findOrFail($id);

        if ($token->name === 'admin_token') {
            return new AdminResource($token->tokenable);
        } elseif ($token->name === 'customer_token') {
            return new CustomerResource($token->tokenable);
        }

        return 'There is no resource';
    }
}
