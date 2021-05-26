<?php

namespace App\Http\AppAPI\Controllers\Customer;

use App\Http\AppAPI\Controllers\Controller;
use App\Http\AppAPI\Requests\Customer\CustomerRegisterRequest;
use Domain\Customers\Actions\CustomerCreateAction;
use Domain\Customers\Actions\CustomerCreateTokenAction;
use Illuminate\Http\Request;

class APICustomerRegisterController extends Controller
{
    public CustomerCreateAction $customerCreateAction;

    public CustomerCreateTokenAction $customerCreateTokenAction;

    public function __construct(
        CustomerCreateAction $customerCreateAction,
        CustomerCreateTokenAction $customerCreateTokenAction
    )
    {
        $this->customerCreateAction = $customerCreateAction;
        $this->customerCreateTokenAction = $customerCreateTokenAction;
    }

    public function register(CustomerRegisterRequest $request)
    {
        $customer = $this->customerCreateAction->execute($request);
        $token = $this->customerCreateTokenAction->execute($customer->email);

        return response()->json([
            'access_token' => $token,
            'type_token' => 'Bearer'
        ]);
    }
}