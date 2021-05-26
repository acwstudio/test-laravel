<?php


namespace Domain\Customers\Actions;

use Domain\Customers\Models\Customer;
use Hash;
use Illuminate\Http\Request;

class CustomerCreateAction
{
    public function execute(Request $request): Customer
    {
        return Customer::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);
    }
}
