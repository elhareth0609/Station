<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sim extends Model {
    protected $fillable = [
    'station_id', 'name', 'provider_name', 'rat','phone', 'imei', 'ip', 'status',
    'connection_status', 'network_type', 'signal_strength', 'unread_messages', 'last_seen_at'
    ];

    public function station()
    {
        return $this->belongsTo(Station::class);
    }

    public function ussds()
    {
        return $this->hasMany(Ussd::class);
    }

}
