<?php

namespace App\Http\AppAPI\Resources\Token;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TokenCollection extends ResourceCollection
{
    /**
     * @var string
     */
    public $collects = TokenResource::class;

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
