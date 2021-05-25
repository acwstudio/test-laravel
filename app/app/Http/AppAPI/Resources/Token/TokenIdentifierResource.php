<?php

namespace App\Http\AppAPI\Resources\Token;

use Illuminate\Http\Resources\Json\JsonResource;

class TokenIdentifierResource extends JsonResource
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
            'type' => 'tokens'
        ];
    }
}
