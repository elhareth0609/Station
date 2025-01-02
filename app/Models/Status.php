<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model {

    protected $fillable = [
        'name'
    ];

    public function orders() {
        return $this->hasMany(OrderStatus::class, 'status_id');
    }
}
