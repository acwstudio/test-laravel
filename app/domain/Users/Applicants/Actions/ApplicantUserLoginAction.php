<?php


namespace Domain\Users\Applicants\Actions;


use Domain\Users\Applicants\Models\Applicant;
use Hash;
use Illuminate\Validation\ValidationException;

class ApplicantUserLoginAction
{
    /**
     * @param array $data
     * @return array
     * @throws ValidationException
     */
    public function execute(array $data): array
    {
        /** @var Applicant $applicant */
        $applicant = Applicant::where('email', $data['email'])->first();

        if (!$applicant || !Hash::check($data['password'], $applicant->password)) {

            throw ValidationException::withMessages([
                'password' => ['The provided credentials are incorrect.'],
            ]);

        }

        if ($applicant->tokens()->where('name', $data['client'])->count() === 0) {

            $token = $applicant->createToken($data['client'], ['employer','applicant'])->plainTextToken;
            return compact('applicant', 'token');

        } else {

            $applicant->tokens()->delete();
            $token = $applicant->createToken($data['client'], ['employer','applicant'])->plainTextToken;

            return compact('applicant', 'token');

        }

    }
}
