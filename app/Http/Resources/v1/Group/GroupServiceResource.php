<?php

namespace App\Http\Resources\v1\Group;

use Illuminate\Http\Resources\Json\JsonResource;

class GroupServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this -> id,
            'service_name' => $this -> service_name,
            'service_cost' => $this -> service_cost,
          ];
    }
}

