<?php

namespace App\Http\AppAPI\Resources\Admin;

use App\Http\AppAPI\Resources\Token\TokenIdentifierResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AdminResource extends JsonResource
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
            'type' => 'admins',
            'attributes' => [
                'name' => $this->name,
                'email' => $this->email,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ],
            'relationships' => [
                'tokens' => [
                    'links' => [
                        'self' => route('api.admin.relationships.tokens', ['id' => $this->id]),
                        'related' => route('api.admin.tokens', ['id' => $this->id])
                    ],
                    'data' => TokenIdentifierResource::collection($this->whenLoaded('tokens'))
                ],
            ]
        ];
    }
}
