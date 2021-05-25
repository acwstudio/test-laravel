<?php

namespace App\Http\AppAPI\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class AdminIdentifierResource extends JsonResource
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
            'type' => 'admins'
        ];
    }
}
