<?php

namespace App\Http\Resources\v1\Client;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\v1\Individual\IndividualServiceResource;


class ClientIndividualResource extends JsonResource
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
            'individual_name' => $this -> individual_name,
            'services' => IndividualServiceResource::make($this -> services)
        ];
    }
}
