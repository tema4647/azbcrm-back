<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    public function clients(){
      return $this->belongsToMany(Client::class);
    }
    public function services()
    {
      return $this->hasOne(Service::class, 'id', 'service_id'); 

    }


    protected $table = "tickets";
     protected $fillable = [
         'id',
         'ticket_name',
         'ticket_cost',
         'visit_cost',
         'ticket_discount',
         'ticket_visits',
         'service_id'
     ];
     	
     protected $guarded = false;
}

