<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model {
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'code', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sims()
    {
        return $this->hasMany(Sim::class);
    }

}
