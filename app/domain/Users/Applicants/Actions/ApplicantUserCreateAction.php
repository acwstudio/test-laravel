<?php


namespace Domain\Users\Applicants\Actions;


use Domain\Users\Applicants\Models\Applicant;
use Hash;
use Illuminate\Database\Eloquent\Model;

class ApplicantUserCreateAction
{
    /**
     * @param array $data
     * @return Model|Applicant
     */
    public function execute(array $data): Model|Applicant
    {
        return Applicant::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }
}
