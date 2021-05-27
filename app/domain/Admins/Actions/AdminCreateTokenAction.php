<?php


namespace Domain\Admins\Actions;

use Domain\Admins\Models\Admin;

class AdminCreateTokenAction
{
    /**
     * @param string $email
     * @return string
     */
    public function execute(array $request): string
    {
        $admin = Admin::where('email', $request['email'])->first();

        return $admin->createToken($request['client'], ['admin'])->plainTextToken;
    }
}
