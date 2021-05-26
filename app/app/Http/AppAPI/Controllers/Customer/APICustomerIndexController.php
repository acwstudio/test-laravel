<?php

namespace App\Http\AppAPI\Controllers\Customer;

use App\Http\AppAPI\Controllers\Controller;
use App\Http\AppAPI\Resources\Customer\CustomerCollection;
use App\Http\AppAPI\Resources\Customer\CustomerResource;
use Domain\Customers\Models\Customer;
use Illuminate\Http\Request;

class APICustomerIndexController extends Controller
{
    /**
     * @return CustomerCollection
     */
    public function index(): CustomerCollection
    {
        $customers = Customer::with('tokens')->get();

        return new CustomerCollection($customers);
    }

    /**
     * @param $id
     * @return CustomerResource
     */
    public function show($id): CustomerResource
    {
        $customer = Customer::with('tokens')->findOrFail($id);

        return new CustomerResource($customer);
    }
}
