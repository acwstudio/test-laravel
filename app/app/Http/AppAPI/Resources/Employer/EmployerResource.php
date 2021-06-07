<?php

namespace App\Http\AppAPI\Resources\Employer;

use App\Http\AppAPI\Resources\Token\TokenIdentifierResource;
use Domain\Users\Employers\Models\Employer;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class EmployerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'type' => 'employers',
            'attributes' => [
                'name' => $this->name,
                'email' => $this->email,
                'banned' => $this->banned,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ],
            'relationships' => [
                'tokens' => [
                    'links' => [
//                        'self' => route('api.customers.relationships.tokens', ['id' => $this->id]),
//                        'related' => route('api.customers.tokens', ['id' => $this->id])
                    ],
//                    'data' => TokenIdentifierResource::collection($this->whenLoaded('tokens'))
                ],
            ]
        ];
    }
}
