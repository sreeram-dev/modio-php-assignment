<?php

namespace Tests\Helpers\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class TestModResource extends JsonResource
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
            'user_id' => new TestUserResource($this->whenLoaded('user')),
            'name' => $this->resource->getName(),
            'path' => $this->resource->getPath(),
            'created_at' => Carbon::parse($this->resource->getCreatedAt())->toDateTimeString(),
        ];
    }
}
