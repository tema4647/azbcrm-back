<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Client extends Model
{
    use HasFactory;

    public function groups(){
        return $this->belongsToMany(Group::class);
    }

    public function individuals(){
        return $this->belongsToMany(Individual::class);
    }

    public function tickets(){
        return $this->belongsToMany(Ticket::class)->using(ClientTicket::class)->withPivot('ticket_count', 'ticket_current_amount');
    }

    public function visits()
    {
      return $this->hasMany(Visit::class);
    }

    public function transactions()
    {
      return $this->hasMany(Transaction::class);
    }

    protected $table = "clients";
    protected $fillable = [
        'id',
        'client_child_fio',
        'client_child_birth',
        'client_parent_fio',
        'client_parent_phone',
        'client_parent_email',
        'client_parent_amount'
    ];

    protected $guarded = false;
}
