<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    public function clients(){

        // return $this->belongsToMany(Client::class, 'client_group', 'group_id', 'client_id' );
        return $this->belongsToMany(Client::class);


    }
    public $timestamps = false;

    protected $table = "groups";
    // protected $fillable = [
    //     'id',
    //     'gpoup_name'
    // ];

    // protected $guarded = [];
    protected $guarded = false;
    
}
