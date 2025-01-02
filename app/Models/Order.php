<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

    protected $fillable = [
        'place_pickup',
        'longitude_pickup',
        'latitude_pickup',
        'pickup_at',
        'place_delivery',
        'longitude_delivery',
        'latitude_delivery',
        'delivered_at',
        'sender_phone',
        'receiver_phone',
        'amount',
        'image',
        'distance',
        'driver_distance'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function driver() {
        return $this->belongsTo(User::class, 'driver_id');
    }

    public function statuses() {
            return $this->hasMany(OrderStatus::class, 'order_id');
    }

}
