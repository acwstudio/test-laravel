<?php

namespace App\Http\AppAPI\Resources\Applicant;

use Illuminate\Http\Resources\Json\JsonResource;

class ApplicantIdentifierResource extends JsonResource
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
            'type' => 'applicants'
        ];
    }
}
