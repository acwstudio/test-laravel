<?php


namespace Domain\Users\Employers\Actions;


use Domain\Users\Admins\Models\Admin;
use Domain\Users\Employers\Models\Employer;
use Illuminate\Http\JsonResponse;

class EmployerUserLogoutAction
{
    /**
     * @param $id
     * @return JsonResponse
     */
    public function execute(): JsonResponse
    {
        /** @var Employer $employer */
        $employer = auth()->user();

        foreach ($employer->tokens as $token) {
            // Preventing Admin user from logout
            if ($token->tokenable_type === Admin::class) {
                return response()->json('Action is forbidden', 403);
            }
        }

        $employer->tokens()->delete();

        return response()->json(null, 204);
    }
}
