<?php

namespace App\Http\AppAPI\Resources\Token;

use App\Http\AppAPI\Resources\Admin\AdminIdentifierResource;
use App\Http\AppAPI\Resources\Applicant\ApplicantIdentifierResource;
use App\Http\AppAPI\Resources\Employer\EmployerIdentifierResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TokenResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'type' => 'tokens',
            'attributes' => [
                'tokenable_type' => $this->tokenable_type,
                'tokenable_id' => $this->tokenable_id,
                'name' => $this->name,
                'abilities' => $this->abilities,
                'last_used_at' => $this->last_used_at,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ],
            'relationships' => [
                'tokenable' => [
                    'links' => [
                        'self' => route('api.admins.tokens.relationships.tokenable', ['id' => $this->id]),
                        'related' => route('api.admins.tokens.tokenable', ['id' => $this->id]),
                    ],
                    'data' => $this->typeResource()
                ],
            ]
        ];
    }

    /**
     * @return AdminIdentifierResource|ApplicantIdentifierResource|EmployerIdentifierResource
     */
    private function typeResource(): EmployerIdentifierResource|AdminIdentifierResource|ApplicantIdentifierResource
    {
        if ($this->tokenable_type === 'Domain\Users\Admins\Models\Admin') {
            return new AdminIdentifierResource($this->whenLoaded('tokenable'));
        } else if ($this->tokenable_type === 'Domain\Users\Employers\Models\Employer') {
            return new EmployerIdentifierResource($this->whenLoaded('tokenable'));
        } else if ($this->tokenable_type === 'Domain\Users\Applicants\Models\Applicant') {
            return new ApplicantIdentifierResource($this->whenLoaded('tokenable'));
        }
    }
}
