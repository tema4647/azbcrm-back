<?php

namespace App\Http\Resources\v1\Client;

use Illuminate\Http\Resources\Json\JsonResource;


class ClientResource extends JsonResource
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
          'client_child_fio' => $this -> client_child_fio,
          'client_child_birth' => $this -> client_child_birth,
          'client_parent_fio' => $this -> client_parent_fio,
          'client_parent_phone' => $this -> client_parent_phone,
          'client_parent_email' => $this -> client_parent_email,
          'client_parent_amount' => $this -> client_parent_amount,
          'groups' => ClientGroupResource::collection($this -> groups),
          'visits' => ClientVisitResource::collection($this -> visits),
          'tickets' => ClientTicketResource::collection($this -> tickets),

          'created_at' => $this->created_at,
          'updated_at' => $this->updated_at,
        ];
    }
}
