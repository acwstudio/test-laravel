<?php

namespace App\Http\AppAPI\Controllers\Customer;

use App\Http\AppAPI\Controllers\Controller;
use App\Http\AppAPI\Resources\Token\TokenCollection;
use Domain\Customers\Models\Customer;
use Illuminate\Http\Request;

class APICustomerTokensRelatedController extends Controller
{
    public function index($id)
    {
        $customer = Customer::findOrFail($id);

        return new TokenCollection($customer->tokens);
    }
}
