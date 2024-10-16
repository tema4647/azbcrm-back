<?php

namespace App\Http\Resources\v1\Client;



use Illuminate\Http\Resources\Json\JsonResource;

class ClientVisitResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this -> id,
            'client_id' => $this -> client_id,
            'visit_date' => $this -> visit_date
        ];
    }
}
