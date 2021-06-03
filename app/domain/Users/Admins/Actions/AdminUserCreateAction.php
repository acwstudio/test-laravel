<?php


namespace Domain\Users\Admins\Actions;

use Domain\Users\Admins\Models\Admin;
use Hash;

class AdminUserCreateAction
{
    /**
     * @param array $request
     * @return \Domain\Users\Admins\Models\Admin
     */
    public function execute(array $data): Admin
    {
        return Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
