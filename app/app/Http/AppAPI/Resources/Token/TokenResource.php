<?php

namespace App\Http\AppAPI\Resources\Token;

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
                'admins' => [
                    'links' => [

                    ],
                    'data' => ''
                ]
            ]
        ];
    }
}
