<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model {
    protected $fillable = [
        'provider',
        'ticket_number',
        'balance',
        'status',
        'used_at',
    ];

}
