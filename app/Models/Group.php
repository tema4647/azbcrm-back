<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    public function services()
    {
      return $this->hasOne(Service::class, 'id', 'service_id'); 

    }

    public function clients(){
        return $this->belongsToMany(Client::class);
    }
    // public $timestamps = false;

    protected $table = "groups";
    protected $fillable = [
        'id',
        'group_name',
        'service_id'
    ];

    protected $guarded = false;
    
}
