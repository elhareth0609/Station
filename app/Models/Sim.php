<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sim extends Model {
    protected $fillable = [
        'station_id',
        'name',
        'phone',
        'imei',
        'ip',
        'status'
    ];

    public function station() {
        return $this->belongsTo(Station::class, 'station_id');
    }

    public function ussds() {
        return $this->hasMany(Ussd::class, 'sim_id');
    }
}
