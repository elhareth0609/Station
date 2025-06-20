<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sim extends Model {
    protected $fillable = [
    'station_id', 'name', 'provider_name', 'rat','phone', 'imei', 'ip', 'status',
    'connection_status', 'network_type', 'signal_strength', 'unread_messages', 'last_seen_at',
            'pin_code', // <-- ADD THIS

    ];

    protected $hidden = [
        'pin_code', // <-- ADD THIS to prevent it from ever being sent in API responses
    ];

        /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        // This will automatically encrypt the PIN when saving to the DB
        // and decrypt it when you access it in your code.
        'pin_code' => 'encrypted', // <-- ADD THIS
        'last_seen_at' => 'datetime',
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
