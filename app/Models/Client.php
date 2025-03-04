<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model {
    protected $fillable = [
        'client_name',
        'client_email',
        'client_phone'
    ];

    public function stations() {
        return $this->hasMany(Station::class, 'client_id');
    }
}
