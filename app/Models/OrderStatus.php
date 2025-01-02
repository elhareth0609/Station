<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model {


    protected $fillable = [
        'status_id',
        'order_id'
    ];

    public function orders() {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function status() {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
