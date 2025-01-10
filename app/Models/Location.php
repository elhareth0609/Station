<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model {

    protected $fillable = [
        'car_id',
        'long',
        'late',
    ];


    public function car() {
        return $this->belongsTo(Car::class);
    }
}
