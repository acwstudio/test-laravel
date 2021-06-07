<?php


namespace Domain\Users\Admins\Actions;

use Domain\Users\Admins\Models\Admin;
use Hash;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class AdminUserUpdateAction
{
    /**
     * @param array $data
     * @param int $id
     * @return Collection|Model|Admin|Admin[]
     */
    public function execute(array $data, int $id): Admin|array|Collection|Model
    {
        $data['password'] = Hash::make($data['password']);

        $admin = Admin::findOrFail($id);

        $admin->update($data);

        return $admin;
    }
}
