<?php


namespace Domain\Admins\Actions;


use Domain\Admins\Models\Admin;

class AdminUserLogoutAction
{
    public function execute()
    {
        /** @var Admin $admin */
        $admin = auth()->user();

        $admin->tokens()->delete();

        return response()->json(null, 204);
    }
}
