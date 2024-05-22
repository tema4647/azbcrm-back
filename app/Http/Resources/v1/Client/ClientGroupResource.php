<?php

namespace App\Http\Resources\v1\Client;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientGroupResource extends JsonResource
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
            'group_name' => $this -> group_name
        ];
    }
}
