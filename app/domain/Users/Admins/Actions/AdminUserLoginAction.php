<?php


namespace Domain\Users\Admins\Actions;

use Domain\Users\Admins\Models\Admin;
use Hash;
use Illuminate\Validation\ValidationException;

class AdminUserLoginAction
{
    /**
     * @param array $request
     * @return array
     * @throws ValidationException
     */
    public function execute(array $request): array
    {
        /** @var Admin $admin */
        $admin = Admin::where('email', $request['email'])->first();

        if (!$admin || !Hash::check($request['password'], $admin->password)) {

            throw ValidationException::withMessages([
                'password' => ['The provided credentials are incorrect.'],
            ]);

        }

        if ($admin->tokens()->where('name', $request['client'])->count() === 0) {

            $token = $admin->createToken($request['client'], ['admin','customer'])->plainTextToken;
            return compact('admin', 'token');

        } else {

            $admin->tokens()->delete();
            $token = $admin->createToken($request['client'], ['admin','customer'])->plainTextToken;
            return compact('admin', 'token');

        }
    }
}
