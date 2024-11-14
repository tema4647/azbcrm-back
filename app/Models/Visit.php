<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    public function clients(){
        return $this->belongsTo(Client::class);
    }

    public function services()
    {
      return $this->hasOne(Service::class, 'id', 'service_id'); 
    }

    // public $timestamps = false;

    protected $table = "visits";
    protected $fillable = [
        'id',
        'client_id',
        'service_id',
        'group_id',
        'individual_id',
        'visit_date'
    ];

    protected $guarded = false;
}
