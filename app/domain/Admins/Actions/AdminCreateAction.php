<?php


namespace Domain\Admins\Actions;

use Domain\Admins\Models\Admin;
use Hash;
use Illuminate\Http\Request;

class AdminCreateAction
{
    /**
     * @param Request $request
     * @return Admin
     */
    public function execute(Request $request): Admin
    {
        return Admin::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);
    }
}
