<?php

namespace App\Http\AppAPI\Resources\Token;

use App\Http\AppAPI\Resources\Admin\AdminIdentifierResource;
use App\Http\AppAPI\Resources\Customer\CustomerIdentifierResource;
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
                        'self' => route('api.tokens.relationships.tokenable', ['id' => $this->id]),
                        'related' => route('api.tokens.tokenable', ['id' => $this->id]),
                    ],
                    'data' => $this->typeResource()
                ],
            ]
        ];
    }

    /**
     * @return CustomerIdentifierResource|AdminIdentifierResource|string
     */
    private function typeResource(): CustomerIdentifierResource|AdminIdentifierResource|string
    {
        if ($this->name === 'admin_token') {
            return new AdminIdentifierResource($this->whenLoaded('tokenable'));
        } elseif ($this->name === 'customer_token') {
            return new CustomerIdentifierResource($this->whenLoaded('tokenable'));
        }

        return 'There is no resource';
    }
}
