<?php

namespace Tests\Helpers\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class TestTokenResource extends JsonResource
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
            'id' => $this->resource->getId(),
            'key' => $this->resource->getKey(),
            'revoked' => $this->resource->getRevoked(),
            'created_at' => Carbon::parse($this->resource->getCreatedAt())->toDateTimeString(),
        ];
    }
}
