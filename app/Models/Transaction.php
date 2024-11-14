<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = "transactions";
    protected $fillable = [
        'id',
        'client_id',	
        'transaction_type',	
        'transaction_reason',	
        'transaction_account',
        'transaction_amount',	
        'transaction_date',
    ];

    protected $guarded = false;
}
