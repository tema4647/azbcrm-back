<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ClientTicket extends Pivot
{
    use HasFactory;
    protected $casts = [ 
        'ticket_count',
        'ticket_current_amount'
    ];

    protected $hidden = [ 
        
    ];
}
