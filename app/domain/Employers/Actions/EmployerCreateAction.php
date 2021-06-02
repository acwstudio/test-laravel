<?php


namespace Domain\Employers\Actions;

use Domain\Employers\Models\Employer;

class EmployerCreateAction
{
    public function execute(array $data)
    {
        return Employer::create($data);
    }
}
