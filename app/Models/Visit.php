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

    // public $timestamps = false;

    protected $table = "visits";
    protected $fillable = [
        'id',
        'client_id',
        'visit_date'
    ];

    protected $guarded = false;
}
