<?php

namespace App\Http\AppAPI\Resources\Admin;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AdminCollection extends ResourceCollection
{
    /**
     * @var string
     */
    public $collects = AdminResource::class;

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
