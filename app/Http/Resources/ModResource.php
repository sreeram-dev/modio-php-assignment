<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ModResource extends JsonResource
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
            'id' => $this->getId(),
            'user_id' => new UserResource($this->user),
            'name' => $this->getName(),
            'path' => $this->getPath(),
            'created_at' => Carbon::parse($this->getCreatedAt())->toDateTimeString(),
        ];
    }

}