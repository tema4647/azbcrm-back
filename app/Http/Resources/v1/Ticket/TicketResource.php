<?php

namespace App\Http\Resources\v1\Ticket;
use Illuminate\Http\Resources\Json\JsonResource;


class TicketResource extends JsonResource
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
          'ticket_name' => $this -> ticket_name,
          'ticket_cost' => $this -> ticket_cost,
          'visit_cost' => $this -> visit_cost,
          'ticket_discount' => $this -> ticket_discount,
          'ticket_visits' => $this -> ticket_visits,
          'service_id' => $this -> service_id,
          'services' => TicketServiceResource::make($this -> services),

          'created_at' => $this->created_at,
          'updated_at' => $this->updated_at,
        ];
    }
}
