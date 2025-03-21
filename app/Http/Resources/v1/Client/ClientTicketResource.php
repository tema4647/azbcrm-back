<?php

namespace App\Http\Resources\v1\Client;

use Illuminate\Http\Resources\Json\JsonResource;



class ClientTicketResource extends JsonResource
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
            'ticket_count' => $this->pivot->ticket_count,
            'ticket_current_amount' => $this->pivot->ticket_current_amount
        ];
    }
}
