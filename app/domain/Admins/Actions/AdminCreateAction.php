<?php


namespace Domain\Admins\Actions;

use Domain\Admins\Models\Admin;
use Hash;

class AdminCreateAction
{
    /**
     * @param array $request
     * @return Admin
     */
    public function execute(array $request): Admin
    {
        return Admin::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
    }
}
