<?php


namespace Domain\Customers\Actions;

use Domain\Customers\Models\Customer;
use Hash;

class CustomerCreateAction
{
    public function execute(array $request): Customer
    {
        return Customer::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
    }
}
