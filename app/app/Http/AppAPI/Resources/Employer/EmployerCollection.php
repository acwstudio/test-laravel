<?php

namespace App\Http\AppAPI\Resources\Employer;

use Illuminate\Http\Resources\Json\ResourceCollection;

class EmployerCollection extends ResourceCollection
{
    /**
     * @var string
     */
    public $collects = EmployerResource::class;

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
