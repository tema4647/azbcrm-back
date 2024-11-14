<?php

namespace App\Http\Resources\v1\Transaction;

use Illuminate\Http\Resources\Json\JsonResource;


class TransactionResource extends JsonResource
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
        'client_id' => $this -> client_id,
        'transaction_type' => $this -> transaction_type,		
        'transaction_reason' => $this -> transaction_reason,		
        'transaction_account' => $this -> transaction_account,	
        'transaction_amount' => $this -> transaction_amount,		
        'transaction_date' => $this -> transaction_date
        ];
    }
}
