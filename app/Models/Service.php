<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;


    public function tickets()
    {
      return $this->hasMany(Ticket::class);
      // return $this->belongsTo(Ticket::class);

    }
    

     protected $table = "services";
     protected $fillable = [
         'id',
         'service_name',
         'service_cost'
     ];
 
     protected $guarded = false;
}
