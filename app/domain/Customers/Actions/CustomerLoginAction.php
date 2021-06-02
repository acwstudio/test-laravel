<?php


namespace Domain\Customers\Actions;

use Domain\Customers\Models\Customer;
use Hash;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class CustomerLoginAction
{
    /**
     * @param array $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function execute(array $request): JsonResponse
    {
        /** @var Customer $customer */
        $customer = Customer::where('email', $request['email'])->first();

        if (!$customer || !Hash::check($request['password'], $customer->password)) {
            throw ValidationException::withMessages([
                'password' => ['The provided credentials are incorrect.'],
            ]);
        }

        if (!$customer->tokens()->where('name', $request['client'])) {
            return response()->json([
                'message' => $customer->email . ' doesn\'t have token',
                'new token' => $customer->createToken($request['client'], ['customer'])->plainTextToken
            ], 401);
        }

        return response()->json([
            'message' => 'Log In is successful, everything OK!',
        ], 200);
    }
}
