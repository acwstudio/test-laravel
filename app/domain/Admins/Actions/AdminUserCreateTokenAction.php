<?php


namespace Domain\Admins\Actions;

use Domain\Admins\Models\Admin;

class AdminUserCreateTokenAction
{
    /**
     * @param array $request
     * @return string
     */
    public function execute(array $request): string
    {
        $admin = Admin::where('email', $request['email'])->first();

        return $admin->createToken($request['client'], ['admin','customer'])->plainTextToken;
    }
}
