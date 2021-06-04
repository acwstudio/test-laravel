<?php


namespace Domain\Users\Employers\Actions;


use Domain\Users\Employers\Models\Employer;
use Illuminate\Http\JsonResponse;

class EmployerUserDestroyAction
{
    /**
     * @param int $id
     * @return JsonResponse
     */
    public function execute(int $id): JsonResponse
    {
        $employer = Employer::findOrFail($id);
        $employer->tokens()->delete();
        $employer->delete();

        return response()->json(null, 204);
    }
}
