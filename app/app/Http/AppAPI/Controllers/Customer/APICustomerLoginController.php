<?php

namespace App\Http\AppAPI\Controllers\Customer;

use App\Http\AppAPI\Controllers\Controller;
use App\Http\AppAPI\Requests\Customer\CustomerLoginRequest;
use Domain\Customers\Actions\CustomerCreateTokenAction;
use Domain\Customers\Actions\CustomerLoginAction;
use Domain\Customers\Actions\CustomerLogoutAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class APICustomerLoginController extends Controller
{
    /**
     * @var CustomerLoginAction
     */
    public CustomerLoginAction $customerLoginAction;

    /**
     * @var CustomerLogoutAction
     */
    public CustomerLogoutAction $customerLogoutAction;

    /**
     * APICustomerLoginController constructor.
     * @param CustomerLoginAction $customerLoginAction
     * @param CustomerLogoutAction $customerLogoutAction
     */
    public function __construct(
        CustomerLoginAction $customerLoginAction,
        CustomerLogoutAction $customerLogoutAction
    )
    {
        $this->customerLoginAction = $customerLoginAction;
        $this->customerLogoutAction = $customerLogoutAction;
    }

    /**
     * Show Login form
     *
     * @param CustomerLoginRequest $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function login(CustomerLoginRequest $request): JsonResponse
    {
        return $this->customerLoginAction->execute($request->all());
    }

    public function logout()
    {
        return auth()->user()->tokenCan('admin');
    }
}
