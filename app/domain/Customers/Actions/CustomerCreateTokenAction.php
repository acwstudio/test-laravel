<?php


namespace Domain\Customers\Actions;

use Domain\Customers\Models\Customer;

class CustomerCreateTokenAction
{
    /**
     * @param array $request
     * @return string
     */
    public function execute(array $request): string
    {
        $customer = Customer::where('email', $request['email'])->first();

        return $customer->createToken($request['client'], ['customer'])->plainTextToken;
    }
}
