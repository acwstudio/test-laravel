<?php


namespace Domain\Customers\Actions;

use Domain\Customers\Models\Customer;

class CustomerCreateTokenAction
{
    /**
     * @param string $email
     * @return string
     */
    public function execute(string $email): string
    {
        $customer = Customer::where('email', $email)->first();

        return $customer->createToken('customer_token')->plainTextToken;
    }
}
