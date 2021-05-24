<?php


namespace Domain\Admins\Actions;

use Domain\Admins\Models\Admin;

class AdminCreateTokenAction
{
    /**
     * @param string $email
     * @return string
     */
    public function execute(string $email): string
    {
        $admin = Admin::where('email', $email)->first();

        return $admin->createToken('apiToken')->plainTextToken;
    }
}
