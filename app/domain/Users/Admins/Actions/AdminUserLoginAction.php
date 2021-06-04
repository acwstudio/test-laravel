<?php


namespace Domain\Users\Admins\Actions;

use Domain\Users\Admins\Models\Admin;
use Hash;
use Illuminate\Validation\ValidationException;

class AdminUserLoginAction
{
    /**
     * @param array $data
     * @return array
     * @throws ValidationException
     */
    public function execute(array $data): array
    {
        /** @var Admin $admin */
        $admin = Admin::where('email', $data['email'])->first();

        if (!$admin || !Hash::check($data['password'], $admin->password)) {

            throw ValidationException::withMessages([
                'password' => ['The provided credentials are incorrect.'],
            ]);

        }

        if ($admin->tokens()->where('name', $data['client'])->count() === 0) {

            $token = $admin->createToken($data['client'], ['admin','employer'])->plainTextToken;
            return compact('admin', 'token');

        } else {

            $admin->tokens()->delete();
            $token = $admin->createToken($data['client'], ['admin','employer'])->plainTextToken;
            return compact('admin', 'token');

        }
    }
}
