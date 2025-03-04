<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Station extends Model {
    protected $fillable = [
        'user_id',
        'name',
        'code',
        'status'
    ];

    public function client() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function sims() {
        return $this->hasMany(Sim::class);
    }

}
