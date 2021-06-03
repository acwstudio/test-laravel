<?php


namespace Domain\Users\Employers\Actions;


use Domain\Users\Employers\Models\Employer;
use Hash;
use Illuminate\Database\Eloquent\Model;

class EmployerUserCreateAction
{
    /**
     * @param array $data
     * @return Employer|Model
     */
    public function execute(array $data): Model|Employer
    {
        return Employer::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
