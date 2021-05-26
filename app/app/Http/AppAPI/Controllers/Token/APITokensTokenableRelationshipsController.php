<?php

namespace App\Http\AppAPI\Controllers\Token;

use App\Http\AppAPI\Controllers\Controller;
use App\Http\AppAPI\Resources\Admin\AdminIdentifierResource;
use App\Http\AppAPI\Resources\Customer\CustomerIdentifierResource;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;

class APITokensTokenableRelationshipsController extends Controller
{
    /**
     * @param $id
     * @return CustomerIdentifierResource|AdminIdentifierResource|string
     */
    public function index($id): CustomerIdentifierResource|AdminIdentifierResource|string
    {
        return $this->typeIdentifierResource($id);
    }

    public function update()
    {

    }

    /**
     * resource selection depending on the entity tokenable
     *
     * @param $id
     * @return CustomerIdentifierResource|AdminIdentifierResource|string
     */
    private function typeIdentifierResource($id): CustomerIdentifierResource|AdminIdentifierResource|string
    {
        $token = PersonalAccessToken::findOrFail($id);

        if ($token->name === 'admin_token') {
            return new AdminIdentifierResource($token->tokenable);
        } elseif ($token->name === 'customer_token') {
            return new CustomerIdentifierResource($token->tokenable);
        }

        return 'There is no identifier resource';
    }
}
