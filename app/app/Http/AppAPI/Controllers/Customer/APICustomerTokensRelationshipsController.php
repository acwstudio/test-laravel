<?php

namespace App\Http\AppAPI\Controllers\Customer;

use App\Http\AppAPI\Controllers\Controller;
use App\Http\AppAPI\Resources\Token\TokenIdentifierResource;
use Domain\Customers\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class APICustomerTokensRelationshipsController extends Controller
{
    /**
     * @param $id
     * @return AnonymousResourceCollection
     */
    public function index($id): AnonymousResourceCollection
    {
        $customer = Customer::findOrFail($id);

        return TokenIdentifierResource::collection($customer->tokens);
    }

    public function update()
    {

    }
}
