<?php


namespace Domain\Users\Employers\Actions;


use Domain\Users\Employers\Models\Employer;
use Illuminate\Validation\ValidationException;
use Hash;

class EmployerUserLoginAction
{
    /**
     * @param array $data
     * @throws ValidationException
     */
    public function execute(array $data)
    {
        /** @var Employer $employer */
        $employer = Employer::where('email', $data['email'])->first();

        if (!$employer || !Hash::check($data['password'], $employer->password)) {

            throw ValidationException::withMessages([
                'password' => ['The provided credentials are incorrect.'],
            ]);

        }

        if ($employer->tokens()->where('name', $data['client'])->count() === 0) {

            $token = $employer->createToken($data['client'], ['admin','customer'])->plainTextToken;
            return compact('employer', 'token');

        } else {

            $employer->tokens()->delete();
            $token = $employer->createToken($data['client'], ['admin','customer'])->plainTextToken;
            return compact('employer', 'token');

        }
    }
}
