<?php


namespace Domain\Users\Employers\Actions;


use Domain\Users\Employers\Models\Employer;
use Hash;

class EmployerUserUpdateAction
{
    public function execute(array $data, $id)
    {
        $data['password'] = Hash::make($data['password']);

        $employer = Employer::findOrFail($id);

        $employer->update($data);

        return $employer;
    }
}
